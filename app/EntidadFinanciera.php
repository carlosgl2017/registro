<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EntidadFinanciera extends Model
{
    protected $table='entidad_financiera';
    protected $primaryKey='id_entidad';
    public $timestamps=true;

    protected $fillable=[
        'nombre',
        'condicion'
    ];
}
