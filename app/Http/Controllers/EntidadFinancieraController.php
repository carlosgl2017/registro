<?php

namespace App\Http\Controllers;

use App\EntidadFinanciera;
use Illuminate\Http\Request;

class EntidadFinancieraController extends Controller
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
     * @param  \App\EntidadFinanciera  $entidadFinanciera
     * @return \Illuminate\Http\Response
     */
    public function show(EntidadFinanciera $entidadFinanciera)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EntidadFinanciera  $entidadFinanciera
     * @return \Illuminate\Http\Response
     */
    public function edit(EntidadFinanciera $entidadFinanciera)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EntidadFinanciera  $entidadFinanciera
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EntidadFinanciera $entidadFinanciera)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EntidadFinanciera  $entidadFinanciera
     * @return \Illuminate\Http\Response
     */
    public function destroy(EntidadFinanciera $entidadFinanciera)
    {
        //
    }


    public function selectEntidad(Request $request){
        if (!$request->ajax()) return redirect('/');
        $entidades = EntidadFinanciera::where('condicion','=','1')
        ->select('id_entidad','nombre')->orderBy('nombre', 'asc')->get();
        return ['entidades' => $entidades];        
    }
}
