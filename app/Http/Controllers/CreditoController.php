<?php

namespace App\Http\Controllers;

use App\Credito;
use App\Persona;
use Illuminate\Http\Request;

class CreditoController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $id_persona = Persona::where('id', auth()->user()->id)->firstOrFail()->id_persona;
        $credito = Credito::where('id_persona',$id_persona)->get();        
        return ['credito' => $credito];           
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
        $exist= Credito::where('id_persona', $id_persona)->count();
        if (!$request->ajax()) return redirect('/');
        if($exist==0)
        {
            $credito = new Credito();
            $credito->monto = $request->monto;
            $credito->plazo_meses = $request->plazo_meses;
            $credito->id_persona = $id_persona;
            $credito->id_destino = $request->id_destino;
            $credito->id_tipo_credito = $request->id_tipo_credito;
            $credito->save();    
        }else{            
            $id = Credito::where('id_persona', $id_persona)->firstOrFail()->id_credito;
            $credito = Credito::findOrFail($id);
            $credito->monto = $request->monto;
            $credito->plazo_meses = $request->plazo_meses;
            $credito->id_persona = $id_persona;
            $credito->id_destino = $request->id_destino;
            $credito->id_tipo_credito = $request->id_tipo_credito;
            $credito->save(); 
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Credito  $credito
     * @return \Illuminate\Http\Response
     */
    public function show(Credito $credito)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Credito  $credito
     * @return \Illuminate\Http\Response
     */
    public function edit(Credito $credito)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Credito  $credito
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Credito $credito)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Credito  $credito
     * @return \Illuminate\Http\Response
     */
    public function destroy(Credito $credito)
    {
        //
    }
}
