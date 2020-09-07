<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bien extends Model
{
    protected $table='bien';
    protected $primaryKey='id_bien';
    public $timestamps=true;
    protected $fillable=[
        'descripcion',
        'marca',
        'serie',
        'valor',
        'id_tipo_bien',
        'id_persona'
    ];
}
