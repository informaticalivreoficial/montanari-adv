<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Configuracoes;
use App\Models\Process;
use App\Mail\Web\Atendimento;
use App\Models\User;
use App\Models\Post;
use App\Models\CatPost;
use App\Models\Slide;
use App\Services\Asset;
use App\Support\Seo;

class WebController extends Controller
{
    protected $seo, $config;

    public function __construct()
    {
        $this->seo = new Seo();
        $this->config = Configuracoes::where('id', 1)->first();
    }

    public function home()
    {
        $head = $this->seo->render($this->config->app_name ?? env('APP_NAME'),
            $this->config->information ?? env('APP_NAME'),
            route('web.home'),
            $this->config->getmetaimg() ?? url(asset('theme/images/image.jpg'))
        ); 

        $slides = Slide::orderBy('created_at', 'DESC')->where('status', '1')->limit(4)->get();
        
        $artigos = Post::with(['categoriaObject', 'images'])
            ->orderBy('created_at', 'DESC')
            ->where('status', '1')
            ->where('type', 'artigo')
            ->limit(3)
            ->get();

        // Dados reais de processos para o CTA
        $totalProcessos = Process::count();
        $processosAtivos = Process::where('status', 'active')->count();
        $processosEncerrados = Process::whereIn('status', ['closed', 'archived'])->count();
        $totalClientes = User::whereHas('roles', fn($q) => $q->where('name', 'client'))->count();
        
        return view('web.home', [
            'slides' => $slides,
            'head' => $head,
            'artigos' => $artigos,
            'totalProcessos' => $totalProcessos,
            'processosAtivos' => $processosAtivos,
            'processosEncerrados' => $processosEncerrados,
            'totalClientes' => $totalClientes,
        ]);
    } 
    
    public function politica()
    {
        $Configuracoes = Configuracoes::where('id', '1')->first();
        
        $head = $this->seo->render('Política de Privacidade - ' . $this->config->app_name ?? env('APP_NAME'),
            'Política de privacidade ' . $this->config->app_name ?? 'Montanari Advocacia - Escritório de Advocacia',
            route('web.politica-de-privacidade'),
            $this->config->getmetaimg() ?? url(asset('theme/images/image.jpg'))
        ); 

        return view('web.politica-de-privacidade', [
            'head' => $head,
            'Configuracoes' => $Configuracoes
        ]);
    }

    /**
     * Exibe uma página dinâmica criada no painel (type = page, menu = 1).
     */
    public function pagina($slug)
    {
        $Configuracoes = Configuracoes::where('id', '1')->first();
        $pagina = Post::with('images')->where('slug', $slug)
            ->where('type', 'page')
            ->where('status', 1)
            ->firstOrFail();

        $pagina->increment('views');

        $head = $this->seo->render(
            $pagina->title . ' - ' . ($this->config->app_name ?? env('APP_NAME')),
            $pagina->excerpt ?? strip_tags($pagina->content),
            url('/pagina/') . '/' . $pagina->slug,
            $pagina->cover()
        );

        return view('web.pagina', [
            'pagina' => $pagina,
            'head' => $head
        ]);
    }

    public function pesquisa(Request $request)
    {
        $search = $request->search;

        $artigos = Post::orderBy('created_at', 'DESC')
                    ->where('type', '=', 'artigo')
                    ->where('title', 'LIKE', '%'.$search.'%')
                    ->orWhere('type', 'LIKE', '%'.$search.'%')
                    ->orWhere('tags', 'LIKE', '%'.$search.'%')
                    ->get();
        $servicos = Post::orderBy('created_at', 'DESC')
                    ->where('type', '=', 'page')
                    ->where('title', 'LIKE', '%'.$search.'%')
                    ->orWhere('type', 'LIKE', '%'.$search.'%')
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

        $head = $this->seo->render('Pesquisa no site - '.$this->config->app_name ?? env('APP_NAME'),
            'Resultados da pesquisa por '.$search,
            route('web.pesquisa'),
            $this->config->getmetaimg() ?? url(asset('theme/images/image.jpg'))
        );

        return view('web.pesquisa', [
            'search' => $search,
            'artigos' => $artigos,
            //'projetos' => $projetos,
            'servicos' => $servicos,
            'ctotal' => $ctotal,
            'head' => $head
        ]);        
    } 
    
    public function atendimento()
    {
        $Configuracoes = Configuracoes::where('id', '1')->first();
        $head = $this->seo->render('Atendimento',
            'Nossa equipe está pronta para melhor atender as demandas de nossos clientes!',
            route('web.atendimento'),
            $this->config->getmetaimg() ?? url(asset('theme/images/image.jpg'))
        );

        return view('web.atendimento', [
            'head' => $head
        ]);
    } 
    
    public function artigos()
    {
        $posts = Post::orderBy('created_at', 'DESC')->where('type', '=', 'artigo')->postson()->paginate(12);

        $head = $this->seo->render('Blog - ' . $this->config->app_name ?? env('APP_NAME'),
            'Confira nossos artigos sobre arquitetura, design e dicas para sua obra!!',
            route('web.blog.artigos'),
            $this->config->getmetaimg() ?? url(asset('theme/images/image.jpg'))
        );
        return view('web.blog.artigos', [
            'head' => $head,
            'posts' => $posts,
        ]);
    }

    public function artigo(Request $request)
    {
        $post = Post::with('images')->where('slug', $request->slug)->where('type', '=', 'artigo')->postson()->first();
        $categorias = CatPost::orderBy('title', 'ASC')
            ->where('type', 'artigo')
            ->get();
        $postsMais = Post::orderBy('views', 'DESC')->limit(3)->where('id', '!=', $post->id)->where('type', 'artigo')->postson()->get();

        $postsTags = Post::where('type', 'artigo')->where('id', '!=', $post->id)->postson()->limit(3)->get();
        
        $post->views = $post->views + 1;
        $post->save();

        $head = $this->seo->render($post->title . ' - ' . $this->config->app_name ?? env('APP_NAME'),
            strip_tags($post->getContentWebAttribute()),
            route('web.blog.artigo', ['slug' => $post->slug]),
            url($post->cover() ?? $this->config->getmetaimg() ?? url(asset('theme/images/image.jpg')))
        );

        return view('web.blog.artigo', [
            'head' => $head,
            'post' => $post,    
            'postsMais' => $postsMais,
            'categorias' => $categorias,       
            'postsTags' => $postsTags,
        ]);
    }   

    public function categoria(Request $request)
    {
        $categoria = CatPost::where('slug', '=', $request->slug)->where('type', '=', 'artigo')->first();
        $posts = Post::orderBy('created_at', 'DESC')->where('category', '=', $categoria->id)->where('type', '=', 'artigo')->postson()->paginate(15);
        
        $head = $this->seo->render('Blog - ' . $categoria->title . ' - ' . $this->config->app_name ?? env('APP_NAME'),
            $categoria->title,
            route('web.blog.categoria', ['slug' => $request->slug]),
            $this->config->getmetaimg() ?? url(asset('theme/images/image.jpg'))
        );

        return view('web.blog.categoria', [
            'head' => $head,
            'posts' => $posts,
            'categoria' => $categoria
        ]);
    }

    public function terms()
    {
        $head = $this->seo->render('Termos e Condições - ' . $this->config->app_name ?? env('APP_NAME'),
            'Leia nossos termos e condições e saiba como seus direitos sejam respeitados.',
            route('web.terms'),
            $this->config->getmetaimg() ?? url(asset('theme/images/image.jpg'))
        );

        return view("web.terms-conditions",[
            'head' => $head,
            'terms_conditions' => $this->config->terms_conditions
        ]);
    }
    
}
