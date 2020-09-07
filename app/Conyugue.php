<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conyugue extends Model
{
    protected $table='conyugues';
    protected $primaryKey='id_conyugues';
    public $timestamps=true;

    protected $fillable=[
        'conyugue',
        'id_persona'
    ];
}
