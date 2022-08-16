<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class Imovel extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'proprietario' => 'required',
            'categoria' => 'required',
            'tipo' => 'required',
            'valor_venda' => 'required_if:venda,on',
            'valor_locacao' => 'required_if:locacao,on',
//            'iptu' => 'required',
//            'condominio' => 'required',
//            'description' => 'required',
            
//            'suites' => 'required',
//            'bathrooms' => 'required',
//            'rooms' => 'required',
//            'garage' => 'required',
//            'garage_covered' => 'required',
//            'area_total' => 'required',
//            'area_util' => 'required',
//
//            // Address
            
//            'street' => 'required',
//            'number' => 'required',
//            'neighborhood' => 'required',
            'uf' => 'required',
            'cidade' => 'required',
            'cep' => 'required|min:8|max:9',
            'dormitorios' => 'required',
//
            'titulo' => 'required'
        ];
    }
}

