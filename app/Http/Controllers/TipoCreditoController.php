<?php

namespace App\Http\Controllers;
use App\TipoCredito;
use Illuminate\Http\Request;

class TipoCreditoController extends Controller
{
    public function selectTipoCredito(Request $request){
        if (!$request->ajax()) return redirect('/');
        $creditos = TipoCredito::where('condicion','=','1')
        ->select('id_tipo_credito','tipo_credito')->orderBy('tipo_credito', 'asc')->get();
        return ['creditos' => $creditos];        
    } 
}
