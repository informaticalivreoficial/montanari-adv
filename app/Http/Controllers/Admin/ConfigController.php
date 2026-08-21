<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Configuracoes as ConfiguracoesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Support\Cropper;
use App\Models\Configuracoes;
use App\Models\Estados;
use App\Models\Cidades;
use Carbon\Carbon;

class ConfigController extends Controller
{
    
    public function edit($id)
    {
        $config = Configuracoes::where('id', $id)->first(); 
        $estados = Estados::orderBy('estado_nome', 'ASC')->get();
        $cidades = Cidades::orderBy('cidade_nome', 'ASC')->get();
        
        $sitemap = Carbon::createFromFormat('Y-m-d', $config->sitemap_data);
        $datahoje = Carbon::now();
        $diferenca = $datahoje->diffInDays($sitemap); // saída: X dias

        $feeddata = Carbon::createFromFormat('Y-m-d', $config->rss_data);
        $feeddatahoje = Carbon::now();
        $feeddatadiferenca = $feeddatahoje->diffInDays($feeddata); // saída: X dias
        
        
        return view('admin.configuracoes.edit', [
            'config' => $config,
            'estados' => $estados,
            'cidades' => $cidades,
            'diferenca' => $diferenca,
            'feeddatadiferenca' => $feeddatadiferenca
        ]);
    }
    
    public function fetchCity(Request $request)
    {
        $data['cidades'] = Cidades::where("estado_id",$request->estado_id)->get(["cidade_nome", "cidade_id"]);
        return response()->json($data);
    }
    
    public function update(ConfiguracoesRequest $request, $id)
    {
        $config = Configuracoes::where('id', $id)->first(); 

        if(!empty($request->file('metaimg'))){
            Storage::delete($config->metaimg);
            Cropper::flush($config->metaimg);
            $config->metaimg = '';
        }
        
        if(!empty($request->file('logo'))){
            Storage::delete($config->logo);
            Cropper::flush($config->logo);
            $config->logo = '';
        }
        
        if(!empty($request->file('logo_admin'))){
            Storage::delete($config->logo_admin);
            Cropper::flush($config->logo_admin);
            $config->logo_admin = '';
        }
        
        if(!empty($request->file('favicon'))){
            Storage::delete($config->favicon);
            Cropper::flush($config->favicon);
            $config->favicon = '';
        }
        
        if(!empty($request->file('watermark'))){
            Storage::delete($config->watermark);
            Cropper::flush($config->watermark);
            $config->watermark = '';
        }
        
        if(!empty($request->file('imgheader'))){
            Storage::delete($config->imgheader);
            Cropper::flush($config->imgheader);
            $config->imgheader = '';
        }
        
        $config->fill($request->all());
        
        if(!empty($request->file('metaimg'))){
            $config->metaimg = $request->file('metaimg')->storeAs(env('AWS_PASTA') . 'configuracoes', 'metaimg-'.Str::slug($request->app_name)  . '.' . $request->file('metaimg')->extension());
        }
        
        if(!empty($request->file('logo'))){
            $config->logo = $request->file('logo')->storeAs(env('AWS_PASTA') . 'configuracoes', 'logo-'.Str::slug($request->app_name)  . '.' . $request->file('logo')->extension());
        }
        
        if(!empty($request->file('logo_admin'))){
            $config->logo_admin = $request->file('logo_admin')->storeAs(env('AWS_PASTA') . 'configuracoes', 'logo-admin-'.Str::slug($request->app_name)  . '.' . $request->file('logo_admin')->extension());
        }
        
        if(!empty($request->file('favicon'))){
            $config->favicon = $request->file('favicon')->storeAs(env('AWS_PASTA') . 'configuracoes', 'favicon-'.Str::slug($request->app_name)  . '.' . $request->file('favicon')->extension());
        }
        
        if(!empty($request->file('watermark'))){
            $config->watermark = $request->file('watermark')->storeAs(env('AWS_PASTA') . 'configuracoes', 'watermark-'.Str::slug($request->app_name)  . '.' . $request->file('watermark')->extension());
        }
        
        if(!empty($request->file('imgheader'))){
            $config->imgheader = $request->file('imgheader')->storeAs(env('AWS_PASTA') . 'configuracoes', 'imgheader-'.Str::slug($request->app_name)  . '.' . $request->file('imgheader')->extension());
        }
        
        if(!$config->save()){
            return redirect()->back()->withInput()->withErrors();
        }

        return redirect()->route('admin.configuracoes.edit', $config->id)->with(['color' => 'success', 'message' => 'Configurações atualizadas com sucesso!']);
    }
   
}