<?php

namespace App\Http\Controllers;

use App\TipoSalario;
use Illuminate\Http\Request;

class TipoSalarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TipoSalario  $tipoSalario
     * @return \Illuminate\Http\Response
     */
    public function show(TipoSalario $tipoSalario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TipoSalario  $tipoSalario
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoSalario $tipoSalario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoSalario  $tipoSalario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoSalario $tipoSalario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipoSalario  $tipoSalario
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoSalario $tipoSalario)
    {
        //
    }
    public function selectTipoSalario(Request $request){
        if (!$request->ajax()) return redirect('/');
        $salarios = TipoSalario::where('condicion','=','1')
        ->select('id_tiposalario','tipo_salario')->orderBy('tipo_salario', 'asc')->get();
        return ['salarios' => $salarios];        
    } 
}
