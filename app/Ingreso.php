<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    protected $table='ingresos';
    protected $primaryKey='id_ingresos';
    public $timestamps=true;

    protected $fillable=[
        'ingreso_mensual',
        'aporte_afp',
        'tiempo_trabajo_meses',
        'tiempo_trabajo_anios',
        'id_persona',
        'id_tipoingreso',
        'id_tiposalario'
    ];
}
