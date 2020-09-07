<?php

use Illuminate\Database\Seeder;
use App\EstadoCivil;
class EstadoCivilTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EstadoCivil::create([
            'estado_civil' => 'Casado(a)',
            'condicion' => true
        ]);
        EstadoCivil::create([
            'estado_civil' => 'Soltero(a)',
            'condicion' => true
        ]);
        EstadoCivil::create([
            'estado_civil' => 'Divorciado(a)',
            'condicion' => true
        ]);
        EstadoCivil::create([
            'estado_civil' => 'Concubino(a)',
            'condicion' => true
        ]);
        EstadoCivil::create([
            'estado_civil' => 'Viudo(a)',
            'condicion' => true
        ]);
    }
}
