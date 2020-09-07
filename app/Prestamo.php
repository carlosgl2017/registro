<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    protected $table='prestamos';
    protected $primaryKey='id_prestamos';
    public $timestamps=true;

    protected $fillable=[
        'cuota_mensual',
        'saldo',
        'id_entidad',
        'id_persona'
    ];
}
