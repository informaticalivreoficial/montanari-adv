<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User as UserRequest;
use App\Support\Cropper;
use App\Models\User;
use App\Models\Estados;
use App\Models\Cidades;
use Spatie\Permission\Exceptions\UnauthorizedException;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('client', 1)->orderBy('created_at', 'DESC')->orderBy('status', 'ASC')->paginate(25);
        return view('admin.users.index', [
            'users' => $users
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function team()
    {
        $users = User::where('admin', '=', '1')->orWhere('editor', '=', '1')->paginate(12);
        return view('admin.users.team', [
            'users' => $users    
        ]);
    }    
       
    public function userSetStatus(Request $request)
    {        
        $user = User::find($request->id);
        $user->status = $request->status;
        $user->save();
        return response()->json(['success' => true]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estados = Estados::orderBy('estado_nome', 'ASC')->get();
        $cidades = Cidades::orderBy('cidade_nome', 'ASC')->get();

        $roles = Role::all();

        foreach($roles as $role) {
            $role->can = false;
        }

        return view('admin.users.create',[
            'estados' => $estados,
            'cidades' => $cidades,
            'roles' => $roles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {        
        $userCreate = User::create($request->all()); 
        if(!empty($request->file('avatar'))){
            $userCreate->avatar = $request->file('avatar')->storeAs(env('AWS_PASTA') . 'user', Str::slug($request->name)  . '-' . str_replace('.', '', microtime(true)) . '.' . $request->file('avatar')->extension());
            $userCreate->save();
        }

        $rolesRequest = $request->all();
        $roles = null;
        foreach($rolesRequest as $key => $value) {
            if(Str::is('acl_*', $key) == true){
                $roles[] = Role::where('id', ltrim($key, 'acl_'))->first();
            }
        }

        if(!empty($roles)){
            $userCreate->syncRoles($roles);
        } else {
            $userCreate->syncRoles(null);
        }

        return redirect()->route('admin.users.edit', $userCreate->id)->with(['color' => 'success', 'message' => 'Cliente cadastrado com sucesso!']);
    }
    
    
    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {
        $user = User::where('id', $id)->first();
        return view('admin.users.view',[
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id', $id)->first();    
        $estados = Estados::orderBy('estado_nome', 'ASC')->get();
        $cidades = Cidades::orderBy('cidade_nome', 'ASC')->get();

        $roles = Role::all();

        foreach($roles as $role) {
            if ($user->hasRole($role->name)){
                $role->can = true;
            } else {
                $role->can = false;
            }
        }
        
        return view('admin.users.edit', [
            'user' => $user,
            'estados' => $estados,
            'cidades' => $cidades,
            'roles' => $roles
        ]);
    }
    
    public function fetchCity(Request $request)
    {
        $data['cidades'] = Cidades::where("estado_id",$request->estado_id)->get(["cidade_nome", "cidade_id"]);
        return response()->json($data);
    }    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $user = User::where('id', $id)->first();

        $user->setAdminAttribute($request->admin);
        $user->setClientAttribute($request->client);
        $user->setSuperAdminAttribute($request->superadmin);

        if(!empty($request->file('avatar'))){
            Storage::delete($user->avatar);
            Cropper::flush($user->avatar);
            $user->avatar = '';
        }

        $user->fill($request->all());

        if(!empty($request->file('avatar'))){
            $user->avatar = $request->file('avatar')->storeAs(env('AWS_PASTA') . 'user', Str::slug($request->name)  . '-' . str_replace('.', '', microtime(true)) . '.' . $request->file('avatar')->extension());
        }

        if(!$user->save()){
            return redirect()->back()->withInput()->withErrors();
        }

        $rolesRequest = $request->all();
        $roles = null;
        foreach($rolesRequest as $key => $value) {
            if(Str::is('acl_*', $key) == true){
                $roles[] = Role::where('id', ltrim($key, 'acl_'))->first();
            }
        }

        if(!empty($roles)){
            $user->syncRoles($roles);
        } else {
            $user->syncRoles(null);
        }

        return redirect()->route('admin.users.edit', $user->id)->with(['color' => 'success', 'message' => 'Cliente atualizado com sucesso!']);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $user = User::where('id', $request->id)->first();
        $nome = getPrimeiroNome(Auth::user()->name);
        if(!empty($user)){
            if($user->id == Auth::user()->id){
                $json = "<b>$nome</b> você não pode excluir sua própria conta!";
                return response()->json(['error' => $json,'id' => $user->id]);
            }elseif($user->superadmin == 1){
                $json = "<b>$nome</b> você não pode excluir um Super Administrador!";
                return response()->json(['error' => $json,'id' => $user->id]);
            }elseif($user->admin == 1 && $user->client == 1){
                $json = "<b>$nome</b> você tem certeza que deseja excluir este Administrador? Ele também é um Cliente";
                return response()->json(['error' => $json,'id' => $user->id]);
            }elseif($user->admin == 1){
                $json = "<b>$nome</b> você tem certeza que deseja excluir um Administrador?";
                return response()->json(['error' => $json,'id' => $user->id]);
            }elseif($user->admin == 0 && $user->client == 1){
                $json = "<b>$nome</b> você tem certeza que deseja excluir este Cliente?";
                return response()->json(['error' => $json,'id' => $user->id]);
            }else{
                return response()->json(['success' => true]);
            }
        }
    }
    
    public function deleteon(Request $request)
    {
        $user = User::where('id', $request->user_id)->first();        
        if(!empty($user)){
            $perfil = ($user->admin == '1' && $user->client == '1' ? 'Administrador e Cliente' :
                      ($user->admin == '1' && $user->client == '0' ? 'Administrador' :
                      ($user->admin == '0' && $user->client == '1' ? 'Cliente' : 'Cliente')));
            Storage::delete($user->avatar);
            //Cropper::flush($user->avatar);
            $user->delete();
        }
        return redirect()->route('admin.users.team')->with(['color' => 'success', 'message' => $perfil.' removido com sucesso!']);
    }
    
    public function deletecli(Request $request)
    {
        $user = User::where('id', $request->id)->first();
        $nome = getPrimeiroNome(Auth::user()->name);
        if(!empty($user)){
            if($user->id == Auth::user()->id){
                $json = "<b>$nome</b> você não pode excluir sua própria conta!";
                return response()->json(['error' => $json,'id' => $user->id]);
            }elseif($user->superadmin == 1){
                $json = "<b>$nome</b> você não pode excluir este Cliente pois ele também é um Super Administrador!";
                return response()->json(['error' => $json,'id' => $user->id]);
            }elseif($user->admin == 1 && $user->client == 1){
                $json = "<b>$nome</b> você tem certeza que deseja excluir este Cliente? Ele também é um Administrador";
                return response()->json(['error' => $json,'id' => $user->id]);
            }elseif($user->admin == 0 && $user->client == 1){
                $json = "<b>$nome</b> você tem certeza que deseja excluir este Cliente?";
                return response()->json(['error' => $json,'id' => $user->id]);
            }else{
                return response()->json(['success' => true]);
            }
        }
    }
    
    public function deleteoncli(Request $request)
    {
        $user = User::where('id', $request->user_id)->first();        
        if(!empty($user)){
            $perfil = ($user->admin == '1' && $user->client == '1' ? 'Administrador e Cliente' :
                      ($user->admin == '1' && $user->client == '0' ? 'Administrador' :
                      ($user->admin == '0' && $user->client == '1' ? 'Cliente' : 'Cliente')));
            Storage::delete($user->avatar);
            //Cropper::flush($user->avatar);
            $user->delete();
        }
        return redirect()->route('admin.users.index')->with(['color' => 'success', 'message' => $perfil.' removido com sucesso!']);
    } 
}
