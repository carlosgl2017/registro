<?php

namespace App\Http\Controllers;

use App\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles=Rol::all();
        return $roles;
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
        $rol=new Rol();
        $rol->nombre=$request->nombre;
        $rol->descripcion=$request->descripcion;
        $rol->condicion=$request->condicion;
        $rol->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function show(Rol $rol)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function edit(Rol $rol)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $rol=Rol::findOrFail($request->id_rol);
        $rol->nombre=$request->nombre;
        $rol->descripcion=$request->descripcion;
        $rol->condicion=$request->condicion;
        $rol->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rol  $rol
     * @return \Illuminate\Http\Response
     */

    public function desactivar(Request $request)
    {
        $rol=Rol::findOrFail($request->id_rol);
        $rol->condicion=0;
        $rol->save();
    }

    public function activar(Request $request)
    {
        $rol=Rol::findOrFail($request->id_rol);
        $rol->condicion=1;
        $rol->save();
    }
    public function destroy(Rol $rol)
    {
        //
    }
}
