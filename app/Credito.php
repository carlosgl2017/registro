<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Credito extends Model
{
    protected $table='credito';
    protected $primaryKey='id_credito';
    public $timestamps=true;
    protected $fillable=[
        'monto',
        'plazo_meses',
        'id_persona',
        'id_destino',
        'id_tipo_credito',
        'id_tipo_credito'
    ];
}
