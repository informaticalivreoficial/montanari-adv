<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Configuracoes;
//use App\Models\Projeto;
use App\Models\Post;

class RssFeedController extends Controller
{
    public function feed()
    {
        //chama as configuracoes do site
        $Configuracoes = Configuracoes::where('id', '1')->first();
        $posts = Post::orderBy('created_at', 'DESC')->where('tipo', '=', 'artigo')->postson()->limit(20)->get();
        $servicos = Post::orderBy('created_at', 'DESC')->where('tipo', '=', 'pagina')->postson()->limit(20)->get();
        //$projetos = Projeto::orderBy('created_at', 'DESC')->available()->limit(20)->get();

        return response()->view('web.feed', [
            'posts' => $posts,
            'servicos' => $servicos,
            //'projetos' => $projetos,
            'Configuracoes' => $Configuracoes
        ])->header('Content-Type', 'application/xml');
        
    }
}
