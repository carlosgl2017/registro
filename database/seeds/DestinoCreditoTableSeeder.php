<?php

use Illuminate\Database\Seeder;
use App\DestinoCredito;
class DestinoCreditoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DestinoCredito::create([
            'destino_credito' => 'COMPRA DE BIENES MUEBLES',
            'condicion' => true
        ]);

        DestinoCredito::create([
            'destino_credito' => 'LIBRE DISPONIBILIDAD',
            'condicion' => true
        ]);

        DestinoCredito::create([
            'destino_credito' => 'CAPITAL DE INVERSIONES',
            'condicion' => true
        ]);

        DestinoCredito::create([
            'destino_credito' => 'CAPITAL DE OPERACIONES',
            'condicion' => true
        ]);

        DestinoCredito::create([
            'destino_credito' => 'CONSTRUCCIÓN DE VIVIENDA',
            'condicion' => true
        ]);
        DestinoCredito::create([
            'destino_credito' => 'ADQUISICIÓN DE TERRENO',
            'condicion' => true
        ]);
        DestinoCredito::create([
            'destino_credito' => 'REFACCIÓN , REMODELACIÓN, AMPLIACIÓN, MEJORAMIENTO DE VIVIENDA',
            'condicion' => true
        ]);

        DestinoCredito::create([
            'destino_credito' => 'COMPRA DE VIVIENDA',
            'condicion' => true
        ]);
    }
}
