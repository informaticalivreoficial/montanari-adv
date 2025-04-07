<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Support\Cropper;
use App\Models\User;
use App\Models\Post;
//use App\Models\Projeto;
use App\Models\Imovel;
use App\Models\Empresa;
use App\Mail\Admin\RecoverPassSend;
use App\Models\Configuracoes;
use Illuminate\Support\Collection;
use Analytics;
use Spatie\Analytics\Period;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::check() === true) {
            return redirect()->route('admin.home');
        }
        return view('admin.index');
    }
    
    public function home()
    {
        $time = User::where('admin', 1)->count();
        $cliente = User::where('client', 1)->count();

        $postsPostson = Post::postson()->where('tipo', '=', 'artigo')->count();
        $postsPostsoff = Post::postsoff()->where('tipo', '=', 'artigo')->count();
        $postsTotal = Post::where('tipo', '=', 'artigo')->count();
        //Projetos
        //$projetosAvailable = Projeto::available()->count();
        //$projetosUnavailable = Projeto::unavailable()->count();
        //$projetosTotal = Projeto::all()->count(); 
        //EMPRESAS
        $empresasAvailable = Empresa::available()->count();
        $empresasUnavailable = Empresa::unavailable()->count();
        $empresasTotal = Empresa::all()->count(); 

        $artigosLast = Post::orderBy('created_at', 'DESC')->where('tipo', '=', 'artigo')->limit(4)->get();
        $artigosTop = Post::where('status', '=', '1')->where('tipo', '=', 'artigo')->where(DB::raw('YEAR(created_at)'), '=', date('Y'))
                ->limit(4)->get()
                ->sortByDesc('views');
        $totalViewsArtigos = Post::selectRaw('SUM(views) AS VIEWS')
                ->where('status', '=', '1')
                ->where( DB::raw('YEAR(created_at)'), '=', '2021' )
                ->first();

        //$projetosLast = Projeto::orderBy('created_at', 'DESC')->limit(4)->get();
        //$projetosTop = Projeto::where('status', '=', '1')->where(DB::raw('YEAR(created_at)'), '=', date('Y'))
        //        ->limit(4)->get()
        //        ->sortByDesc('views');
        //$totalViewsProjetos = Projeto::selectRaw('SUM(views) AS VIEWS')->where('status', '=', '1')->first();
        //Analitcs
        // $visitasHoje = Analytics::fetchMostVisitedPages(Period::days(1));
        // $visitas365 = Analytics::fetchTotalVisitorsAndPageViews(Period::months(5));
        // $top_browser = Analytics::fetchTopBrowsers(Period::months(5));

        // $analyticsData = Analytics::performQuery(
        //     Period::months(5),
        //        'ga:sessions',
        //        [
        //            'metrics' => 'ga:sessions, ga:visitors, ga:pageviews',
        //            'dimensions' => 'ga:yearMonth'
        //        ]
        //  );

        
        return view('admin.dashboard', [
            'time' => $time,
            'cliente' => $cliente,
            // 'projetosAvailable' => $projetosAvailable,
            // 'projetosUnavailable' => $projetosUnavailable,
            // 'projetosTotal' => $projetosTotal,
            'empresasAvailable' => $empresasAvailable,
            'empresasUnavailable' => $empresasUnavailable,
            'empresasTotal' => $empresasTotal,
            'postsPostson' => $postsPostson,
            'postsPostsoff' => $postsPostsoff,
            'postsTotal' => $postsTotal,
            //'projetosLast' => $projetosLast,
            //'projetosTop' => $projetosTop,
            'artigosLast' => $artigosLast,
            'artigosTop' => $artigosTop,
            //'projetostotalviews' => $totalViewsProjetos->VIEWS,
            'artigostotalviews' => $totalViewsArtigos->VIEWS,
            //Analytics
            // 'visitasHoje' => $visitasHoje,
            // 'analyticsData' => $analyticsData,
            // 'top_browser' => $top_browser,
        ]);
    }

    //FAZER NOVA SENHA
    public function recoverpass(Request $request)
    {
        if ($request->email == '') {
            $json['message'] = $this->message->error('Ooops, informe seu email de login!')->render();
            return response()->json($json);
        }

        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            $json['message'] = $this->message->error('Ooops, informe um e-mail válido')->render();
            return response()->json($json);
        }

        //chama as configuracoes do site
        $Configuracoes = Configuracoes::where('id', '1')->first();
        $user = User::where('email', $request->email)->first();

        if (empty($user)) {
            $json['message'] = $this->message->error('Ooops, este email não está cadastrado!')->render();
            return response()->json($json);
        }

        $data = [
            'sitename' => $Configuracoes->nomedosite,
            'telefone1' => $Configuracoes->telefone1,
            'ano_de_inicio' => $Configuracoes->ano_de_inicio,
            'emailsite' => $Configuracoes->email,
            'username' => $user->name,
            'email' => $request->email,
            'remember_token' => $user->senha
        ];        
        Mail::send(new RecoverPassSend($data));
        $json['success'] = $this->message->error('Um link de redefinição de senha foi enviado para seu email!')->render();
        return response()->json($json);
    }

    public function redefinirsenha(Request $request)
    {
        $urlpost = $request->getPathInfo();
        $urlpost = explode('/',$urlpost);
        $urlpost = array_pop($urlpost);  
        $urlpost = base64_decode($urlpost);      
        return view('admin.recoverpassword',['remember_token' => $urlpost]);
    }

    public function resetpass(Request $request)
    {       
        if (in_array('', $request->only('password', 'password1'))) {
            $json['message'] = $this->message->error('Ooops, repita a senha nos 2 campos')->render();
            return response()->json($json);
        }
        
        if ($request->password != $request->password1) {
            $json['message'] = $this->message->error('Ooops, as duas senhas tem que ser iguais')->render();
            return response()->json($json);
        }

        if (strlen($request->password) < 6 || strlen($request->password) > 12) {
            $json['message'] = $this->message->error('Ooops, sua senha deve conter entre 6 e 12 caracteres!')->render();
            return response()->json($json);
        } 
        $permissionsRequest = $request->except(['password1']);        
        $userupdate = User::where('senha', '=', $request->remember_token)->first();        
        $userupdate->remember_token = bcrypt(Str::random(60));
        $userupdate->password = $request->password;
        $userupdate->senha = $request->password;
        $userupdate->save();
        $json['redirect'] = route('admin.login');
        return response()->json($json);
    }
    
    public function login(Request $request)
    {
        if (in_array('', $request->only('email', 'password'))) {
            $json['message'] = $this->message->error('Ooops, informe todos os dados para efetuar o login')->render();
            return response()->json($json);
        }
        
        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            $json['message'] = $this->message->error('Ooops, informe um e-mail válido')->render();
            return response()->json($json);
        }
        
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            //'remember_me' => $request->remember_me,
        ];        
        
        if (!Auth::attempt($credentials)) {
            $json['message'] = $this->message->error('Ooops, usuário e senha não conferem')->render();
            return response()->json($json);
        }
        
        if (!$this->isAdmin()) {
            Auth::logout();
            $json['message'] = $this->message->error('Ooops, usuário não tem permissão para acessar o painel de controle')->render();
            return response()->json($json);
        }

                
        $this->authenticated($request->getClientIp());
        $json = ([
            'redirect' => route('admin.home'),
            'msg' => 'Seja Bem vindo de volta '.getPrimeiroNome(Auth::user()->name)
        ]);
        return response()->json($json);
    }
    
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
    
    private function isAdmin()
    {
        $user = User::where('id', Auth::user()->id)->first();

        if ($user->admin == 1 || $user->superadmin == 1) {
            return true;
        } else {
            return false;
        }
    }
       
    private function authenticated(string $ip)
    {
        $user = User::where('id', Auth::user()->id);
        $user->update([
            'last_login_at' => date('Y-m-d H:i:s'),
            'last_login_ip' => $ip,
        ]);
    }
}
