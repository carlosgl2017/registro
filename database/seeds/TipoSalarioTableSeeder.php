<?php

use Illuminate\Database\Seeder;
use App\TipoSalario;
class TipoSalarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoSalario::create([
            'tipo_salario'=>'Salario Fijo',
            'condicion'=>true
          ]);

          TipoSalario::create([
            'tipo_salario'=>'Salario Fijo + Variable(comisiones,bonificaciones, etc.)',
            'condicion'=>true
          ]);
    }
}
