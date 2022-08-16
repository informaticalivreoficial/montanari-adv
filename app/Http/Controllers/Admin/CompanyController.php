<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Empresa;
use App\Http\Requests\Admin\Empresa as EmpresaRequest;
use App\Models\Estados;
use App\Models\Cidades;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Empresa::orderBy('created_at', 'DESC')->orderBy('status', 'ASC')->paginate(25);
        return view('admin.empresas.index', [
            'companies' => $companies,
        ]);
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
        $users = User::orderBy('name')->where('superadmin', 0)->get();
        return view('admin.empresas.create', [
            'users' => $users,
            'estados' => $estados,
            'cidades' => $cidades
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpresaRequest $request)
    {
        $criarEmpresa = Empresa::create($request->all());
        $criarEmpresa->fill($request->all());
        
        return redirect()->route('admin.empresas.edit', [
            'empresa' => $criarEmpresa->id,
        ])->with(['color' => 'success', 'message' => 'Empresa cadastrada com sucesso!']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estados = Estados::orderBy('estado_nome', 'ASC')->get();
        $cidades = Cidades::orderBy('cidade_nome', 'ASC')->get();
        $company = Empresa::where('id', $id)->first();
        $users = User::orderBy('name')->where('superadmin', 0)->get();

        return view('admin.empresas.edit', [
            'company' => $company,
            'users' => $users,
            'estados' => $estados,
            'cidades' => $cidades
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
    public function update(EmpresaRequest $request, $id)
    {
        $company = Empresa::where('id', $id)->first();
        $company->fill($request->all());

        $company->save();

        return redirect()->route('admin.empresas.edit', [
            'empresa' => $company->id,
        ])->with(['color' => 'success', 'message' => 'Empresa atualizada com sucesso!']);
    }

    public function empresaSetStatus(Request $request)
    {        
        $empresa = Empresa::find($request->id);
        $empresa->status = $request->status;
        $empresa->save();
        return response()->json(['success' => true]);
    }

    public function delete(Request $request)
    {
        $empresa = Empresa::where('id', $request->id)->first();
        $nome = getPrimeiroNome(Auth::user()->name);

        if(!empty($empresa)){
            $json = "<b>$nome</b> você tem certeza que deseja excluir esta empresa?";                      
            return response()->json(['error' => $json,'id' => $request->id]);
        }else{
            return response()->json(['error' => 'Erro ao excluir']);
        }     
    }

    public function deleteon(Request $request)
    {
        $empresa = Empresa::where('id', $request->empresa_id)->first();
        if(!empty($empresa)){
            $empresa->delete();
        }
        return redirect()->route('admin.empresas.index')->with(['color' => 'success', 'message' => 'Empresa removida com sucesso!']);
    }
    
}
