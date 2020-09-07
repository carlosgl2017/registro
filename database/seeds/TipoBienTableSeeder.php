<?php

use Illuminate\Database\Seeder;
use App\TipoBien;
class TipoBienTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoBien::create([
            'tipo_bien'=>'Bienes del Hogar',
            'condicion'=>true
        ]);

        TipoBien::create([
            'tipo_bien'=>'Bienes del Negocio',
            'condicion'=>true
        ]);

        TipoBien::create([
            'tipo_bien'=>'Mercaderias',
            'condicion'=>true
        ]);
    }
}
