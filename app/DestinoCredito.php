<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DestinoCredito extends Model
{
    protected $table='destino_credito';
    protected $primaryKey='id_destino';
    public $timestamps=true;

    protected $fillable=[
        'destino_credito',
        'condicion'
    ];
}
