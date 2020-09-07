<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Extension extends Model
{
    protected $table='extension';
    protected $primaryKey='id_extension';
    public $timestamps=true;

    protected $fillable=[
        'extension',
        'condicion'
    ];

}
