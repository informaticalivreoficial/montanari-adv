<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Support\Cropper;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Admin\Post as PostRequest;
use App\Models\User;
use App\Models\Post;
use App\Models\PostsGb;
use App\Models\CatPost;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'DESC')->where('tipo', '=', 'artigo')->orderBy('status', 'ASC')->paginate(25);
        return view('admin.artigos.index', [
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = CatPost::orderBy('titulo', 'ASC')->get();
        $users = User::where('admin', '=', '1')->orWhere('superadmin', '=', '1')->get();
        return view('admin.artigos.create',[
            'users' => $users,
            'categorias' => $categorias
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $criarPost = Post::create($request->all());
        $criarPost->fill($request->all());

        $secao = ($request->tipo == 'artigo' ? 'artigos' : 
                 ($request->tipo == 'noticia' ? 'noticias' : 
                 ($request->tipo == 'pagina' ? 'paginas' : 'posts')));

        $criarPost->setSlug();

        $validator = Validator::make($request->only('files'), ['files.*' => 'image']);

        if ($validator->fails() === true) {
            return redirect()->back()->withInput()->with([
                'color' => 'orange',
                'message' => 'Todas as imagens devem ser do tipo jpg, jpeg ou png.',
            ]);
        }
        
        if ($request->allFiles()) {
            foreach ($request->allFiles()['files'] as $image) {
                $postGb = new PostsGb();
                $postGb->post = $criarPost->id;
                $postGb->path = $image->storeAs($secao.'/' . $criarPost->id, Str::slug($request->titulo) . '-' . str_replace('.', '', microtime(true)) . '.' . $image->extension());
                $postGb->save();
                unset($postGb);
            }
        }
        return redirect()->route('admin.'.$secao.'.edit', [
            ''.$request->tipo.'' => $criarPost->id,
        ])->with(['color' => 'success', 'message' => $request->tipo.' cadastrado com sucesso!']);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorias = CatPost::orderBy('titulo', 'ASC')->get();
        $editarPost = Post::where('id', $id)->first();
        $users = User::orderBy('name')->get();

        $secao = ($editarPost->tipo == 'artigo' ? 'artigos' : 
                 ($editarPost->tipo == 'noticia' ? 'noticias' : 
                 ($editarPost->tipo == 'pagina' ? 'paginas' : 'posts')));

        return view('admin.'.$secao.'.edit', [
            'post' => $editarPost,
            'users' => $users,
            'categorias' => $categorias
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $postUpdate = Post::where('id', $id)->first();
        $postUpdate->fill($request->all());

        $secao = ($request->tipo == 'artigo' ? 'artigos' : 
                 ($request->tipo == 'noticia' ? 'noticias' : 
                 ($request->tipo == 'pagina' ? 'paginas' : 'posts')));

        $postUpdate->save();
        $postUpdate->setSlug();

        $validator = Validator::make($request->only('files'), ['files.*' => 'image']);

        if ($validator->fails() === true) {
            return redirect()->back()->withInput()->with([
                'color' => 'orange',
                'message' => 'Todas as imagens devem ser do tipo jpg, jpeg ou png.',
            ]);
        }

        if ($request->allFiles()) {
            foreach ($request->allFiles()['files'] as $image) {
                $postImage = new PostsGb();
                $postImage->post = $postUpdate->id;
                $postImage->path = $image->storeAs(env('AWS_PASTA') . $secao.'/' . $postUpdate->id, Str::slug($request->titulo) . '-' . str_replace('.', '', microtime(true)) . '.' . $image->extension());
                $postImage->save();
                unset($postImage);
            }
        }

        return redirect()->route('admin.'.$secao.'.edit', [
            ''.$request->tipo.'' => $postUpdate->id,
        ])->with(['color' => 'success', 'message' => $request->tipo.' atualizado com sucesso!']);
    }  
    
    public function imageRemove(Request $request)
    {
        $imageDelete = PostsGb::where('id', $request->image)->first();
        Storage::delete(env('AWS_PASTA') . $imageDelete->path);
        //Cropper::flush($imageDelete->path);
        $imageDelete->delete();
        $json = [
            'success' => true,
        ];
        return response()->json($json);
    }

    public function artigoSetStatus(Request $request)
    {        
        $post = Post::find($request->id);
        $post->status = $request->status;
        $post->save();
        return response()->json(['success' => true]);
    }

    public function imageSetCover(Request $request)
    {
        $imageSetCover = PostsGb::where('id', $request->image)->first();
        $allImage = PostsGb::where('post', $imageSetCover->post)->get();
        foreach ($allImage as $image) {
            $image->cover = null;
            $image->save();
        }
        $imageSetCover->cover = true;
        $imageSetCover->save();
        $json = [
            'success' => true,
        ];
        return response()->json($json);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $postdelete = Post::where('id', $request->id)->first();
        $postGb = PostsGb::where('post', $postdelete->id)->first();
        $nome = getPrimeiroNome(Auth::user()->name);

        $tipo = ($postdelete->tipo == 'artigo' ? 'este artigo' : 
                 ($postdelete->tipo == 'noticia' ? 'esta notícia' : 
                 ($postdelete->tipo == 'pagina' ? 'esta página' : 'este post')));

        if(!empty($postdelete)){
            if(!empty($postGb)){
                $json = "<b>$nome</b> você tem certeza que deseja excluir $tipo? Existem imagens adicionadas e todas serão excluídas!";
                return response()->json(['error' => $json,'id' => $postdelete->id]);
            }else{
                $json = "<b>$nome</b> você tem certeza que deseja excluir $tipo?";
                return response()->json(['error' => $json,'id' => $postdelete->id]);
            }            
        }else{
            return response()->json(['error' => 'Erro ao excluir']);
        }
    }
    
    public function deleteon(Request $request)
    {
        $postdelete = Post::where('id', $request->artigo_id)->first();  
        $imageDelete = PostsGb::where('post', $postdelete->id)->first();
        $postR = $postdelete->titulo;

        $secao = ($postdelete->tipo == 'artigo' ? 'artigos' : 
                 ($postdelete->tipo == 'noticia' ? 'noticias' : 
                 ($postdelete->tipo == 'pagina' ? 'paginas' : 'posts')));

        if(!empty($postdelete)){
            if(!empty($imageDelete)){
                Storage::delete(env('AWS_PASTA') . $imageDelete->path);
                //Cropper::flush($imageDelete->path);
                $imageDelete->delete();
                Storage::deleteDirectory(env('AWS_PASTA') . $secao.'/'.$postdelete->id);
                $postdelete->delete();
            }
            $postdelete->delete();
        }
        return redirect()->route('admin.'.$secao.'.index')->with(['color' => 'success', 'message' => $postdelete->tipo.' '.$postR.' foi removido com sucesso!']);
    }
}
