<?php

use Illuminate\Database\Seeder;
use App\Rol;
class RolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rol::create([
            'nombre'=>'ADMINISTRADOR',
            'descripcion'=>'Administrador del Sistema',
            'condicion'=>true
       ]);
        Rol::create([
            'nombre'=>'USUARIO',
            'descripcion'=>'Usuario del sistema',
            'condicion'=>true
       ]);     
    }
}
