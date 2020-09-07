<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {    //$this->call(UsersTableSeeder::class);
        $this->call(RolTableSeeder::class);
        $this->call(NacionalidaTableSeeder::class);
        $this->call(ExtensionTableSeeder::class);
        $this->call(EstadoCivilTableSeeder::class);
        $this->call(TipoIngresoTableSeeder::class);
        $this->call(TipoSalarioTableSeeder::class);
        $this->call(DestinoCreditoTableSeeder::class);
        $this->call(EntidadFinancieraTableSeeder::class);
        $this->call(TipoCreditoTableSeeder::class);
        $this->call(TipoBienTableSeeder::class);
    }
}
