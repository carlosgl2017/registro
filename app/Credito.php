<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Credito extends Model
{
    protected $table='credito';
    protected $primaryKey='id_destino';
    public $timestamps=true;
    protected $fillable=[
        'monto'
    ];
}
