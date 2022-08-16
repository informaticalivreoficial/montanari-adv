<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Support\Cropper;
use Illuminate\Support\Str;
use App\Models\Post;
use App\Models\PostsGb;
use App\Models\CatPost;

class ServicosController extends Controller
{    
    public function index()
    {
        $posts = Post::orderBy('created_at', 'DESC')->where('tipo', '=', 'pagina')->orderBy('status', 'ASC')->paginate(25);
        return view('admin.servicos.index', [
            'posts' => $posts
        ]);
    }
    
    public function create()
    {
        return view('admin.servicos.create');
    }
    
    public function store(Request $request)
    {
        $criarPost = Post::create($request->all());
        $criarPost->fill($request->all());        

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
                $postGb->path = $image->storeAs('servicos/' . $criarPost->id, Str::slug($request->titulo) . '-' . str_replace('.', '', microtime(true)) . '.' . $image->extension());
                $postGb->save();
                unset($postGb);
            }
        }
        return redirect()->route('admin.servicos.edit', [
            'servico' => $criarPost->id,
        ])->with(['color' => 'success', 'message' => 'Atuação cadastrada com sucesso!']);
    } 
    
    public function edit($id)
    {
        $editarPost = Post::where('id', $id)->first();

        return view('admin.servicos.edit', [
            'post' => $editarPost
        ]);
    }
    
    public function update(Request $request, $id)
    {
        $postUpdate = Post::where('id', $id)->first();
        $postUpdate->fill($request->all());        

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
                $postImage->path = $image->storeAs('servicos/' . $postUpdate->id, Str::slug($request->titulo) . '-' . str_replace('.', '', microtime(true)) . '.' . $image->extension());
                $postImage->save();
                unset($postImage);
            }
        }

        return redirect()->route('admin.servicos.edit', [
            'servico' => $postUpdate->id,
        ])->with(['color' => 'success', 'message' => 'Atuação atualizada com sucesso!']);
    }
    
    public function imageRemove(Request $request)
    {
        $imageDelete = PostsGb::where('id', $request->image)->first();
        Storage::delete($imageDelete->path);
        Cropper::flush($imageDelete->path);
        $imageDelete->delete();
        $json = [
            'success' => true,
        ];
        return response()->json($json);
    }

    public function servicoSetStatus(Request $request)
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
    
    public function delete(Request $request)
    {
        $postdelete = Post::where('id', $request->id)->first();
        $postGb = PostsGb::where('post', $request->id)->first();
        $nome = getPrimeiroNome(Auth::user()->name);        

        if(!empty($postdelete)){
            if(!empty($postGb)){
                $json = "<b>$nome</b> você tem certeza que deseja excluir esta Atuação? Existem imagens adicionadas e todas serão excluídas!";
                return response()->json(['error' => $json,'id' => $postdelete->id]);
            }else{
                $json = "<b>$nome</b> você tem certeza que deseja excluir esta Atuação?";
                return response()->json(['error' => $json,'id' => $postdelete->id]);
            }            
        }else{
            return response()->json(['error' => 'Erro ao excluir']);
        }
    }
    
    public function deleteon(Request $request)
    {
        $postdelete = Post::where('id', $request->servico_id)->first();  
        $imageDelete = PostsGb::where('post', $postdelete->id)->first();
        $postR = $postdelete->titulo;        

        if(!empty($postdelete)){
            if(!empty($imageDelete)){
                Storage::delete($imageDelete->path);
                Cropper::flush($imageDelete->path);
                $imageDelete->delete();
                Storage::deleteDirectory('servicos/'.$postdelete->id);
                $postdelete->delete();
            }
            $postdelete->delete();
        }
        return redirect()->route('admin.servicos.index')->with(['color' => 'success', 'message' => $postR.' foi removido com sucesso!']);
    }
}
