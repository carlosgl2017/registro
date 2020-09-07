<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoIngreso extends Model
{
    protected $table='tipo_ingreso';
    protected $primaryKey='id_tipoingreso';
    public $timestamps=true;

    protected $fillable=[
        'tipo_ingreso',
        'condicion'
    ];
}
