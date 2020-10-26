<?php

namespace App\Http\Controllers;

use App\Conyugue;
use App\Persona;
use Illuminate\Http\Request;

class ConyugueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!$request->ajax()) return redirect('/');  
        $id_persona=Persona::where('id',auth()->user()->id)->firstOrFail()->id_persona;
        $exist=Conyugue::where('id_persona',$id_persona)->count();
        if($exist>0)
        {           
            $id_persona = Persona::where('id', auth()->user()->id)->firstOrFail()->id_persona;
            $id_conyugue=Conyugue::where('id_persona',$id_persona)->firstOrFail()->conyugue;
            $persona = Persona::where('id_persona', $id_conyugue)->get();
            return ['persona' => $persona];
        }
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
        $exist= Conyugue::where('id_persona', $id_persona)->count();
        //if($exist>0) return redirect('/');
        if (!$request->ajax()) return redirect('/');
        if($exist==0)
        {
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
    
            if ($persona->save() == true) {           
                $conyugue = new Conyugue();
                $conyugue->conyugue = $persona->id_persona;
                $conyugue->id_persona = $id_persona;
                $conyugue->save();            
            }
        }else{
            $id_persona = Persona::where('id', auth()->user()->id)->firstOrFail()->id_persona; 
            $id_conyugue=Conyugue::where('id_persona',$id_persona)->firstOrFail()->conyugue;         
            $persona = Persona::findOrFail($id_conyugue);
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
     * @param  \App\Conyugue  $conyugue
     * @return \Illuminate\Http\Response
     */
    public function show(Conyugue $conyugue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Conyugue  $conyugue
     * @return \Illuminate\Http\Response
     */
    public function edit(Conyugue $conyugue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Conyugue  $conyugue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Conyugue $conyugue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Conyugue  $conyugue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Conyugue $conyugue)
    {
        //
    }
}
