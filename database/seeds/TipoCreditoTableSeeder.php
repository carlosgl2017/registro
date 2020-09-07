<?php

use Illuminate\Database\Seeder;
use App\TipoCredito;
class TipoCreditoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoCredito::create([
            'tipo_credito'=>'CREDITO DE CONSUMO',
            'condicion'=>true
        ]);
        
        TipoCredito::create([
            'tipo_credito'=>'CREDITO MICROCREDITO',
            'condicion'=>true
        ]);
        
        TipoCredito::create([
            'tipo_credito'=>'CREDITO HIPOTECARIO',
            'condicion'=>true
        ]);
    }
}
