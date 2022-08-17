<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Models\Configuracoes;
use App\Mail\Web\Atendimento;
use App\Models\User;
use App\Models\Newsletter;
use App\Models\Post;
use App\Models\PostsGb;
use App\Models\CatPost;
use App\Models\Slide;
//use App\Models\Projeto;
//use App\Models\Avaliacoes;

class WebController extends Controller
{
    public function home()
    {
        $Configuracoes = Configuracoes::where('id', '1')->first();
        $head = $this->seo->render($Configuracoes->nomedosite ?? 'Informática Livre',
            $Configuracoes->descricao ?? 'Informática Livre desenvolvimento de sistemas web desde 2005',
            route('web.home'),
            Storage::url($Configuracoes->metaimg ?? 'https://informaticalivre.com/media/metaimg.jpg')
        ); 

        $slides = Slide::orderBy('created_at', 'DESC')->where('status', '1')->limit(4)->get();
        //$avaliacoes = Avaliacoes::orderBy('created_at', 'DESC')->where('status', '1')->limit(4)->get();
        //$projetos = Projeto::orderBy('created_at', 'DESC')->where('status', '1')->limit(12)->get();
        //$projetosLink = Projeto::orderBy('created_at', 'DESC')->where('status', '1')->limit(3)->get();
        
        $artigos = Post::orderBy('created_at', 'DESC')->where('status', '1')->where('tipo', 'artigo')->limit(3)->get();
        
        return view('web.home', [
            'slides' => $slides,
            //'avaliacoes' => $avaliacoes,
            //'projetos' => $projetos,
            //'projetosLink' => $projetosLink,
            'head' => $head,
            'Configuracoes' => $Configuracoes,
            'artigos' => $artigos
        ]);
    }
    
    public function servicos()
    {
        $Configuracoes = Configuracoes::where('id', '1')->first();
        $servicos = Post::orderBy('created_at', 'DESC')->where('tipo', '=', 'pagina')->postson()->paginate(9);

        $head = $this->seo->render('Serviços ' . $Configuracoes->nomedosite ?? 'Informática Livre',
            $Configuracoes->descricao ?? 'Informática Livre desenvolvimento de sistemas web desde 2005',
            route('web.servicos'),
            Storage::url($Configuracoes->metaimg ?? 'https://informaticalivre.com/media/metaimg.jpg')
        ); 

        return view('web.servicos', [
            'servicos' => $servicos,
            'Configuracoes' => $Configuracoes,
            'head' => $head
        ]);
    }
    
    public function servico(Request $request)
    {
        $Configuracoes = Configuracoes::where('id', '1')->first();
        $servico = Post::where('slug', $request->slug)->where('tipo', '=', 'pagina')->postson()->first();
        $head = $this->seo->render($servico->titulo . ' - ' . $Configuracoes->nomedosite ?? 'Informática Livre',
            strip_tags($servico->getContentWebSiteAttribute()) ?? 'Informática Livre desenvolvimento de sistemas web desde 2005',
            route('web.servico', ['slug' => $servico->slug]),
            url($servico->cover() ?? Storage::url($Configuracoes->metaimg ?? 'https://informaticalivre.com/media/metaimg.jpg'))
        ); 

        $postsTags = Post::where('tipo', '=', 'pagina')->orWhere('id', '!=', $servico->id)->postson()->limit(3)->get();
                
        $servico->views = $servico->views + 1;
        $servico->save();

        return view('web.servico', [
            'servico' => $servico,
            'head' => $head,
            'postsTags' => $postsTags,
            'Configuracoes' => $Configuracoes
        ]);
    }
    
    public function politica()
    {
        $Configuracoes = Configuracoes::where('id', '1')->first();
        
        $head = $this->seo->render('Política de Privacidade - ' . $Configuracoes->nomedosite ?? 'Informática Livre',
            'Política de privacidade ' . $Configuracoes->nomedosite ?? 'Informática Livre desenvolvimento de sistemas web desde 2005',
            route('web.politica-de-privacidade'),
            Storage::url($Configuracoes->metaimg ?? 'https://informaticalivre.com/media/metaimg.jpg')
        ); 

        return view('web.politica-de-privacidade', [
            'head' => $head,
            'Configuracoes' => $Configuracoes
        ]);
    }

    public function pesquisa(Request $request)
    {
        $Configuracoes = Configuracoes::where('id', '1')->first();        
        $search = $request->search;

        $artigos = Post::orderBy('created_at', 'DESC')
                    ->where('tipo', '=', 'artigo')
                    ->where('titulo', 'LIKE', '%'.$search.'%')
                    ->orWhere('tipo', 'LIKE', '%'.$search.'%')
                    ->orWhere('tags', 'LIKE', '%'.$search.'%')
                    ->get();
        $servicos = Post::orderBy('created_at', 'DESC')
                    ->where('tipo', '=', 'pagina')
                    ->where('titulo', 'LIKE', '%'.$search.'%')
                    ->orWhere('tipo', 'LIKE', '%'.$search.'%')
                    ->orWhere('tags', 'LIKE', '%'.$search.'%')
                    ->get();

        if(!empty($artigos)){
            $c2 = $artigos->count();
        }else{
            $c2 = '0';
        }
        if(!empty($servicos)){
            $c3 = $servicos->count();
        }else{
            $c3 = '0';
        }
        $ctotal = $c2 + $c3;

        $head = $this->seo->render('Pesquisa no site - '.$Configuracoes->nomedosite ?? 'Informática Livre',
            'Resultados da pesquisa por '.$search,
            route('web.pesquisa'),
            Storage::url($Configuracoes->metaimg ?? 'https://informaticalivre.com/media/metaimg.jpg')
        );

        return view('web.pesquisa', [
            'search' => $search,
            'artigos' => $artigos,
            //'projetos' => $projetos,
            'servicos' => $servicos,
            'ctotal' => $ctotal,
            'head' => $head,
            'Configuracoes' => $Configuracoes
        ]);        
    } 
    
    public function atendimento()
    {
        $Configuracoes = Configuracoes::where('id', '1')->first();
        $head = $this->seo->render('Atendimento',
            'Nossa equipe está pronta para melhor atender as demandas de nossos clientes!',
            route('web.atendimento'),
            Storage::url($Configuracoes->metaimg ?? 'https://informaticalivre.com/media/metaimg.jpg')
        );

        return view('web.atendimento', [
            'head' => $head,
            'Configuracoes' => $Configuracoes
        ]);
    }   
    
    public function sendEmail(Request $request)
    {
        $Configuracoes = Configuracoes::where('id', '1')->first();
        if($request->nome == ''){
            $json = "Por favor preencha o campo <strong>Nome</strong>";
            return response()->json(['error' => $json]);
        }
        if(!filter_var($request->email, FILTER_VALIDATE_EMAIL)){
            $json = "O campo <strong>Email</strong> está vazio ou não tem um formato válido!";
            return response()->json(['error' => $json]);
        }
        if($request->mensagem == ''){
            $json = "Por favor preencha sua <strong>Mensagem</strong>";
            return response()->json(['error' => $json]);
        }
        if(!empty($request->bairro) || !empty($request->cidade)){
            $json = "<strong>ERRO</strong> Você está praticando SPAM!"; 
            return response()->json(['error' => $json]);
        }else{
            $data = [
                'sitename' => $Configuracoes->nomedosite,
                'siteemail' => $Configuracoes->email,
                'reply_name' => $request->nome,
                'reply_email' => $request->email,
                'mensagem' => $request->mensagem
            ];
            
            Mail::send(new Atendimento($data));
            
            $json = "Obrigado {$request->nome} sua mensagem foi enviada com sucesso!"; 
            return response()->json(['sucess' => $json]);
        }
    }
    
    public function sendNewsletter(Request $request)
    {
        if(!filter_var($request->email, FILTER_VALIDATE_EMAIL)){
            $json = "O campo <strong>Email</strong> está vazio ou não tem um formato válido!";
            return response()->json(['error' => $json]);
        }
        if(!empty($request->bairro) || !empty($request->cidade)){
            $json = "<strong>ERRO</strong> Você está praticando SPAM!"; 
            return response()->json(['error' => $json]);
        }else{   
            $validaNews = Newsletter::where('email', $request->email)->first();            
            if(!empty($validaNews)){
                Newsletter::where('email', $request->email)->update(['status' => 1]);
                $json = "Seu e-mail já está cadastrado!"; 
                return response()->json(['sucess' => $json]);
            }else{
                $NewsletterCreate = Newsletter::create($request->all());
                $NewsletterCreate->save();
                $json = "Obrigado Cadastrado com sucesso!"; 
                return response()->json(['sucess' => $json]);
            }            
        }
    }

    public function artigos()
    {
        $Configuracoes = Configuracoes::where('id', '1')->first();
        $posts = Post::orderBy('created_at', 'DESC')->where('tipo', '=', 'artigo')->postson()->paginate(12);

        $head = $this->seo->render('Blog - ' . $Configuracoes->nomedosite ?? 'Informática Livre',
            'Confira nossos artigos sobre arquitetura, design e dicas para sua obra!!',
            route('web.blog.artigos'),
            Storage::url($Configuracoes->metaimg ?? 'https://informaticalivre.com/media/metaimg.jpg')
        );
        return view('web.blog.artigos', [
            'head' => $head,
            'Configuracoes' => $Configuracoes,
            'posts' => $posts,
        ]);
    }

    public function artigo(Request $request)
    {
        $Configuracoes = Configuracoes::where('id', '1')->first();
        $post = Post::where('slug', $request->slug)->where('tipo', '=', 'artigo')->postson()->first();
        $categorias = CatPost::orderBy('titulo', 'ASC')
            ->where('tipo', 'artigo')
            ->get();
        $postsMais = Post::orderBy('views', 'DESC')->limit(3)->where('id', '!=', $post->id)->postson()->get();

        $postsTags = Post::where('tipo', '=', 'artigo')->orWhere('id', '!=', $post->id)->postson()->limit(3)->get();
        
        $post->views = $post->views + 1;
        $post->save();

        $head = $this->seo->render($post->titulo . ' - ' . $Configuracoes->nomedosite ?? 'Informática Livre',
            strip_tags($post->getContentWebAttribute()),
            route('web.blog.artigo', ['slug' => $post->slug]),
            url($post->cover() ?? Storage::url($Configuracoes->metaimg ?? 'https://informaticalivre.com/media/metaimg.jpg'))
        );

        return view('web.blog.artigo', [
            'head' => $head,
            'post' => $post,    
            'postsMais' => $postsMais,
            'categorias' => $categorias,
            'Configuracoes' => $Configuracoes,        
            'postsTags' => $postsTags,
        ]);
    }   

    public function categoria(Request $request)
    {
        $Configuracoes = Configuracoes::where('id', '1')->first();
        $categoria = CatPost::where('slug', '=', $request->slug)->where('tipo', '=', 'artigo')->first();
        $posts = Post::orderBy('created_at', 'DESC')->where('categoria', '=', $categoria->id)->where('tipo', '=', 'artigo')->postson()->paginate(15);
        
        $head = $this->seo->render('Blog - ' . $categoria->titulo . ' - ' . $Configuracoes->nomedosite ?? 'Informática Livre',
            $categoria->titulo,
            route('web.blog.categoria', ['slug' => $request->slug]),
            Storage::url($Configuracoes->metaimg ?? 'https://informaticalivre.com/media/metaimg.jpg')
        );

        return view('web.blog.categoria', [
            'head' => $head,
            'posts' => $posts,
            'categoria' => $categoria,
            'Configuracoes' => $Configuracoes
        ]);
    }

    
}
