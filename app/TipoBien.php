<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoBien extends Model
{
    protected $table='tipo_bien';
    protected $primaryKey='id_tipo_bien';
    public $timestamps=true;

    protected $fillable=[
        'tipo_bien',
        'condicion'
    ];
}
