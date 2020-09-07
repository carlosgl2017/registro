<?php

use Illuminate\Database\Seeder;
use App\TipoIngreso;

class TipoIngresoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoIngreso::create([
            'tipo_ingreso'=>'Pension Familiar',
            'condicion'=>true
          ]);

          TipoIngreso::create([
            'tipo_ingreso'=>'Asalariado',
            'condicion'=>true
          ]);
          TipoIngreso::create([
            'tipo_ingreso'=>'Profesional Independiente',
            'condicion'=>true
          ]);

          TipoIngreso::create([
            'tipo_ingreso'=>'Consultor de Línea',
            'condicion'=>true
          ]);

          TipoIngreso::create([
            'tipo_ingreso'=>'Negocio propio',
            'condicion'=>true
          ]);

          TipoIngreso::create([
            'tipo_ingreso'=>'Otros',
            'condicion'=>true
          ]);
    }
}
