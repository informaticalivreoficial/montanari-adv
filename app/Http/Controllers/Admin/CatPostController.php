<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Requests\Admin\CatPost as CatPostRequest;
use Illuminate\Support\Facades\Storage;
use App\Support\Cropper;
use App\Models\CatPost;
use App\Models\Post;
use App\Models\PostsGb;

class CatPostController extends Controller
{
    

    public function secao($tipo)
    {
        $categorias = CatPost::where('tipo', '=', $tipo)->whereNull('id_pai')->paginate(25);
        $secao = $tipo;
        return view('admin.categorias.secao', [
            'categorias' => $categorias,
            'secao' => $secao,
        ]);
    }

    public function categoriacreate($tipo, $catpai)
    {
        return view('admin.categorias.categoriacreate', [
            'tipo' => $tipo,
            'catpai' => $catpai,
        ]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CatPostRequest $request)
    {
        $criarCategoria = CatPost::create($request->all());
        $criarCategoria->fill($request->all());

        $criarCategoria->setSlug();
        
        if($request->id_pai != null){
            return redirect()->route('admin.categorias.edit', [
                'categoria' => $criarCategoria->id,
            ])->with(['color' => 'success', 'message' => 'Sub Categoria cadastrada com sucesso!']);
        }else{
            return redirect()->route('admin.categorias.edit', [
                'categoria' => $criarCategoria->id,
            ])->with(['color' => 'success', 'message' => 'Categoria cadastrada com sucesso!']);
        }
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria = CatPost::where('id', $id)->first();
        return view('admin.categorias.edit', [
            'categoria' => $categoria,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $categoria = CatPost::where('id', $id)->first();
        $categoria->fill($request->all());

        $categoria->save();
        $categoria->setSlug();
        
        if($categoria->id_pai != null){
            return redirect()->route('admin.categorias.edit', [
                'categoria' => $categoria->id,
            ])->with(['color' => 'success', 'message' => 'Sub Categoria atualizada com sucesso!']);
        }else{
            return redirect()->route('admin.categorias.edit', [
                'categoria' => $categoria->id,
            ])->with(['color' => 'success', 'message' => 'Categoria atualizada com sucesso!']);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $categoria = CatPost::where('id', $request->id)->first();
        $subcategoria = CatPost::where('id_pai', $request->id)->first();
        $post = Post::where('categoria', $request->id)->first();
        $nome = getPrimeiroNome(Auth::user()->name);

        $secao = ($categoria->tipo == 'artigo' ? 'artigos' : 
                 ($categoria->tipo == 'noticia' ? 'notícias' : 
                 ($categoria->tipo == 'pagina' ? 'páginas' : 'posts')));

        if(!empty($categoria) && empty($subcategoria)){
            if($categoria->id_pai == null){
                $json = "<b>$nome</b> você tem certeza que deseja excluir esta categoria?";
                return response()->json(['erroron' => $json,'id' => $categoria->id]);
            }else{
                // se tiver posts
                if(!empty($post)){
                    $json = "<b>$nome</b> você tem certeza que deseja excluir esta sub categoria? Ela possui $secao e tudo será excluído!";
                    return response()->json(['erroron' => $json,'id' => $categoria->id]);
                }else{
                    $json = "<b>$nome</b> você tem certeza que deseja excluir esta sub categoria?";
                    return response()->json(['erroron' => $json,'id' => $categoria->id]);
                }                
            }            
        }
        if(!empty($categoria) && !empty($subcategoria)){
            $json = "<b>$nome</b> esta categoria possui sub categorias! É peciso excluí-las primeiro!";
            return response()->json(['error' => $json,'id' => $categoria->id]);
        }else{
            return response()->json(['error' => 'Erro ao excluir']);
        }        
    }
    
    public function deleteon(Request $request)
    {
        $categoria = CatPost::where('id', $request->categoria_id)->first();  
        $post = Post::where('categoria', $request->id)->first();

        $secao = ($categoria->tipo == 'artigo' ? 'artigos' : 
                 ($categoria->tipo == 'noticia' ? 'notícias' : 
                 ($categoria->tipo == 'pagina' ? 'páginas' : 'posts')));

        $categoriaR = $categoria->titulo;

        if(!empty($categoria)){
            if(!empty($post) && !empty($postgb)){
                $postgb = PostsGb::where('post', $post->id)->first();
                Storage::delete($postgb->path);
                Cropper::flush($postgb->path);
                $postgb->delete();
                Storage::deleteDirectory($secao.'/'.$post->id);
                $categoria->delete();
            }
            $categoria->delete();
        }

        if($categoria->id_pai != null){
            return redirect()->route('admin.categorias.secao', [ 
                'tipo' => 'artigo' 
            ])->with(['color' => 'success', 'message' => 'A sub categoria '.$categoriaR.' foi removida com sucesso!']);
        }else{
            return redirect()->route('admin.categorias.secao', [ 
                'tipo' => 'artigo' 
            ])->with(['color' => 'success', 'message' => 'A categoria '.$categoriaR.' foi removida com sucesso!']);
        }        
    }
}
