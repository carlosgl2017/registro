<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadoCivil extends Model
{
    protected $table='estado_civil';
    protected $primaryKey='id_estado_civil';
    public $timestamps=true;

    protected $fillable=[
        'estado_civil',
        'condicion'
    ];
}
