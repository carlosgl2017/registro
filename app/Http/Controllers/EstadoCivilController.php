<?php

namespace App\Http\Controllers;

use App\EstadoCivil;
use Illuminate\Http\Request;

class EstadoCivilController extends Controller
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
     * @param  \App\EstadoCivil  $estadoCivil
     * @return \Illuminate\Http\Response
     */
    public function show(EstadoCivil $estadoCivil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EstadoCivil  $estadoCivil
     * @return \Illuminate\Http\Response
     */
    public function edit(EstadoCivil $estadoCivil)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EstadoCivil  $estadoCivil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EstadoCivil $estadoCivil)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EstadoCivil  $estadoCivil
     * @return \Illuminate\Http\Response
     */
    public function destroy(EstadoCivil $estadoCivil)
    {
        //
    }

    public function selectEstadoCivil(Request $request){
        if (!$request->ajax()) return redirect('/');
        $estados = EstadoCivil::where('condicion','=','1')
        ->select('id_estado_civil','estado_civil')->orderBy('estado_civil', 'asc')->get();
        return ['estados' => $estados];
        
    } 
}
