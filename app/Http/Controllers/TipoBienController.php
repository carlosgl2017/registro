<?php

namespace App\Http\Controllers;

use App\TipoBien;
use Illuminate\Http\Request;

class TipoBienController extends Controller
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
     * @param  \App\TipoBien  $tipoBien
     * @return \Illuminate\Http\Response
     */
    public function show(TipoBien $tipoBien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TipoBien  $tipoBien
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoBien $tipoBien)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoBien  $tipoBien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoBien $tipoBien)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipoBien  $tipoBien
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoBien $tipoBien)
    {
        //
    }


    public function selectTipoBien(Request $request){
        if (!$request->ajax()) return redirect('/');
        $bienes = TipoBien::where('condicion','=','1')
        ->select('id_tipo_bien','tipo_bien')->orderBy('tipo_bien', 'asc')->get();
        return ['bienes' => $bienes];        
    } 
}
