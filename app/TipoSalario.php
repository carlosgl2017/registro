<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoSalario extends Model
{
    protected $table='tipo_salario';
    protected $primaryKey='id_tiposalario';
    public $timestamps=true;
    protected $fillable=[
        'tipo_salario',
        'condicion'
    ];
}
