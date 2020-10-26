<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table='persona';
    protected $primaryKey='id_persona';
    public $timestamps=true;

    protected $fillable=[
        'nombre',
        'ap_paterno',
        'ap_materno',
        'celular',
        'lugar_residencia',
        'direccion',
        'ci',
        'fech_nac',
        'id_nacionalidad',
        'id_extension',
        'id_estado_civil',
        'id'
    ];
}
