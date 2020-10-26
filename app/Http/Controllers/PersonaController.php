<?php

namespace App\Http\Controllers;

use App\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $id_persona = Persona::where('id', auth()->user()->id)->firstOrFail()->id_persona;
        $persona = Persona::where('id_persona', $id_persona)->get();
        return ['persona' => $persona];
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
        $exist = Persona::where('id', auth()->user()->id)->count();
        //if ($exist) return redirect('/');
        if (!$request->ajax()) return redirect('/');
        if ($exist == 0) {
            $persona = new Persona();
            $persona->id_nacionalidad = $request->id_nacionalidad;
            $persona->id_extension = $request->id_extension;
            $persona->id_estado_civil = $request->id_estado_civil;
            $persona->nombre = $request->nombre;
            $persona->ap_paterno = $request->ap_paterno;
            $persona->ap_materno = $request->ap_materno;
            $persona->ci = $request->ci;
            $persona->direccion = $request->direccion;
            $persona->lugar_residencia = $request->lugar_residencia;
            $persona->celular = $request->celular;
            $persona->fech_nac = $request->fech_nac;
            $persona->id = auth()->user()->id;
            $persona->save();
        } else { 
            $id_persona = Persona::where('id', auth()->user()->id)->firstOrFail()->id_persona;          
            $persona = Persona::findOrFail($id_persona);
            $persona->id_nacionalidad = $request->id_nacionalidad;
            $persona->id_extension = $request->id_extension;
            $persona->id_estado_civil = $request->id_estado_civil;
            $persona->nombre = $request->nombre;
            $persona->ap_paterno = $request->ap_paterno;
            $persona->ap_materno = $request->ap_materno;
            $persona->ci = $request->ci;
            $persona->direccion = $request->direccion;
            $persona->lugar_residencia = $request->lugar_residencia;
            $persona->celular = $request->celular;
            $persona->fech_nac = $request->fech_nac;
            $persona->id = auth()->user()->id;
            $persona->save();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function show(Persona $persona)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function edit(Persona $persona)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $articulo = Articulo::findOrFail($request->id);
        $articulo->idcategoria = $request->idcategoria;
        $articulo->codigo = $request->codigo;
        $articulo->nombre = $request->nombre;
        $articulo->precio_venta = $request->precio_venta;
        $articulo->stock = $request->stock;
        $articulo->descripcion = $request->descripcion;
        $articulo->condicion = '1';
        $articulo->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function destroy(Persona $persona)
    {
        //
    }
}
