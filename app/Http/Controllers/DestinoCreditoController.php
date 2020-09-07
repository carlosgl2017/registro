<?php

namespace App\Http\Controllers;

use App\DestinoCredito;
use Illuminate\Http\Request;

class DestinoCreditoController extends Controller
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
     * @param  \App\DestinoCredito  $destinoCredito
     * @return \Illuminate\Http\Response
     */
    public function show(DestinoCredito $destinoCredito)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DestinoCredito  $destinoCredito
     * @return \Illuminate\Http\Response
     */
    public function edit(DestinoCredito $destinoCredito)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DestinoCredito  $destinoCredito
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DestinoCredito $destinoCredito)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DestinoCredito  $destinoCredito
     * @return \Illuminate\Http\Response
     */
    public function destroy(DestinoCredito $destinoCredito)
    {
        //
    }

    public function selectDestino(Request $request){
        if (!$request->ajax()) return redirect('/');
        $destinos = DestinoCredito::where('condicion','=','1')
        ->select('id_destino','destino_credito')->orderBy('destino_credito', 'asc')->get();
        return ['destinos' => $destinos];
        
    } 
}
