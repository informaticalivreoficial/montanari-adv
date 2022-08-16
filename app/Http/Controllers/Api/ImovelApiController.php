<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Imovel;

class ImovelApiController extends Controller
{
    public function index()
    {
        $imoveis = Imovel::orderBy('created_at', 'DESC')->where('status', '1')->get();
        
        return response()->json($imoveis);
    }
}
