<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Mail\MessageReceived;
use Illuminate\Support\Facades\Mail;
use DB;
use App\Bien;
use App\Conyugue;
use App\Persona;
use App\Prestamo;


class BienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_persona = Persona::where('id', auth()->user()->id)->firstOrFail()->id_persona;
        $bienes = DB::table('bien')
            ->join('tipo_bien', 'bien.id_tipo_bien', '=', 'tipo_bien.id_tipo_bien')
            ->select('bien.*', 'tipo_bien.tipo_bien')
            ->where('id_persona', $id_persona)
            ->get();
        return $bienes;

    }
    public function enviar()
    {
        $id_persona = Persona::where('id', auth()->user()->id)->firstOrFail()->id_persona;
        $personas = DB::table('persona')
            ->join('nacionalidad', 'persona.id_nacionalidad', '=', 'nacionalidad.id_nacionalidad')
            ->join('estado_civil', 'persona.id_estado_civil', '=', 'estado_civil.id_estado_civil')
            ->join('extension', 'persona.id_extension', '=', 'extension.id_extension')
            ->select('persona.*', 'nacionalidad.nacionalidad', 'estado_civil.estado_civil', 'extension.extension')
            ->where('id_persona', $id_persona)
            ->get();

        $exist_conyugue = Conyugue::where('id_persona', $id_persona)->count();
        if($exist_conyugue>0)
        {
            $id_conyugue = Conyugue::where('id_persona', $id_persona)->firstOrFail()->conyugue;
            $conyugues = DB::table('persona')
                ->join('nacionalidad', 'persona.id_nacionalidad', '=', 'nacionalidad.id_nacionalidad')
                ->join('estado_civil', 'persona.id_estado_civil', '=', 'estado_civil.id_estado_civil')
                ->join('extension', 'persona.id_extension', '=', 'extension.id_extension')
                ->select('persona.*', 'nacionalidad.nacionalidad', 'estado_civil.estado_civil', 'extension.extension')
                ->where('id_persona', $id_conyugue)
                ->get();
        }
        else{
            $conyugues=[];
        }
        

        $creditos = DB::table('credito')
            ->join('destino_credito', 'credito.id_destino', '=', 'destino_credito.id_destino')
            ->join('tipo_credito', 'credito.id_tipo_credito', '=', 'tipo_credito.id_tipo_credito')
            ->select('credito.*', 'destino_credito.destino_credito', 'tipo_credito.tipo_credito')
            ->where('id_persona', $id_persona)
            ->get();

        $ingresos = DB::table('ingresos')
            ->join('tipo_ingreso', 'ingresos.id_tipoingreso', '=', 'tipo_ingreso.id_tipoingreso')
            ->join('tipo_salario', 'ingresos.id_tiposalario', '=', 'tipo_salario.id_tiposalario')
            ->select('ingresos.*', 'tipo_ingreso.tipo_ingreso', 'tipo_salario.tipo_salario')
            ->where('id_persona', $id_persona)
            ->get();
            
        $exist_prestamo = Prestamo::where('id_persona', $id_persona)->count();   
        if($exist_prestamo>0)
        {
            $prestamos = DB::table('prestamos')
            ->join('entidad_financiera', 'prestamos.id_entidad', '=', 'entidad_financiera.id_entidad')
            ->select('prestamos.*', 'entidad_financiera.nombre')
            ->where('id_persona', $id_persona)
            ->get();
        }  
        else{
            $prestamos=[];
        } 

        $exist_bien = Bien::where('id_persona', $id_persona)->count();
        if($exist_bien>0)
        {
            $bienes = DB::table('bien')
            ->join('tipo_bien', 'bien.id_tipo_bien', '=', 'tipo_bien.id_tipo_bien')
            ->select('bien.*', 'tipo_bien.tipo_bien')
            ->where('id_persona', $id_persona)
            ->get();
            $total_bienes = DB::table('bien')->where('id_persona', $id_persona)->sum('valor');
        }
        else{
            $bienes=[];
            $total_bienes=0;
        }
        
        $msg = $personas;
        Mail::to('csn@sanmartin.com.bo')->send(new MessageReceived($msg,$exist_conyugue,$conyugues,$creditos,$ingresos,$exist_prestamo,$prestamos,$exist_bien,$bienes,$total_bienes
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $id_persona = Persona::where('id', auth()->user()->id)->firstOrFail()->id_persona;
        if (!$request->ajax()) {
            return redirect('/');
        }
        $bien = new Bien();
        $bien->descripcion = $request->descripcion;
        $bien->marca = $request->marca;
        $bien->serie = $request->serie;
        $bien->valor = $request->valor;
        $bien->id_persona = $id_persona;
        $bien->id_tipo_bien = $request->id_tipo_bien;
        $bien->save();
       
        
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bien  $bien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $bien = Bien::findOrFail($request->id);
        $bien->descripcion = $request->descripcion;
        $bien->marca = $request->marca;
        $bien->serie = $request->serie;
        $bien->valor = $request->valor;
        $bien->id_persona = $id_persona;
        $bien->id_tipo_bien = $request->id_tipo_bien;
        $bien->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bien  $bien
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bien $bien)
    {
        //
    }
}
