<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoCredito extends Model
{
    protected $table='tipo_credito';
    protected $primaryKey='id_tipo_credito';
    public $timestamps=true;

    protected $fillable=[
        'tipo_credito',
        'condicion'
    ];
}
