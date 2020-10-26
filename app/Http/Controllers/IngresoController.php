<?php

namespace App\Http\Controllers;

use App\Ingreso;
use App\Persona;
use Illuminate\Http\Request;
use DB;

class IngresoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_persona = Persona::where('id', auth()->user()->id)->firstOrFail()->id_persona;
        $ingresos = DB::table('ingresos')
            ->join('tipo_ingreso', 'ingresos.id_tipoingreso', '=', 'tipo_ingreso.id_tipoingreso')
            ->join('tipo_salario', 'ingresos.id_tiposalario', '=', 'tipo_salario.id_tiposalario')
            ->select('ingresos.*', 'tipo_ingreso.tipo_ingreso','tipo_salario.tipo_salario')
            ->where('id_persona', $id_persona)
            ->get();
        return $ingresos;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        if (!$request->ajax()) return redirect('/');        
        $ingreso = new Ingreso();
        $ingreso->ingreso_mensual = $request->ingreso_mensual;
        $ingreso->descripcion_trabajo = $request->descripcion_trabajo;
        $ingreso->lugar_trabajo = $request->lugar_trabajo;
        $ingreso->tiempo_trabajo_anios = $request->tiempo_trabajo_anios;
        $ingreso->tiempo_trabajo_meses = $request->tiempo_trabajo_meses;
        $ingreso->aporte_afp = $request->aporte_afp;
        $ingreso->id_persona = $id_persona;
        $ingreso->id_tipoingreso = $request->id_tipoingreso;
        $ingreso->id_tiposalario = $request->id_tiposalario;
        $ingreso->save();              
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ingreso  $ingreso
     * @return \Illuminate\Http\Response
     */
    public function show(Ingreso $ingreso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ingreso  $ingreso
     * @return \Illuminate\Http\Response
     */
    public function edit(Ingreso $ingreso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ingreso  $ingreso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ingreso $ingreso)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ingreso  $ingreso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $ingreso = Ingreso::findOrFail($request->id);
        $ingreso->delete();
    }
}
