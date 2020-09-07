<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Mail\MessageReceived;
use Illuminate\Support\Facades\Mail;



class CalificarConsumoController extends Controller
{
    public function enviar()
    {
        $id_persona = Persona::where('id', auth()->user()->id)->firstOrFail()->id_persona;
        $personas = DB::table('persona')
        ->join('nacionalidad', 'persona.id_nacionalidad', '=', 'nacionalidad.id_nacionalidad')           
        ->join('estado_civil', 'persona.id_estado_civil', '=', 'estado_civil.id_estado_civil')
        ->join('extension', 'persona.id_extension', '=', 'extension.id_extension')
        ->select('persona.*', 'nacionalidad.nacionalidad', 'estado_civil.estado_civil', 'extension.extension')
        ->where('id_persona',$id_persona)
        ->get();       
    $msg=$personas;
    Mail::to('jgarcia@sanmartin.com.bo')->send(new MessageReceived($msg));     
    }
}
