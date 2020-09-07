<?php

use Illuminate\Database\Seeder;
use App\Extension;
class ExtensionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Extension::create([
            'extension' => 'LP',
            'condicion'=>1
        ]);
        Extension::create([
            'extension' => 'CB',
            'condicion'=>1
        ]);
        Extension::create([
            'extension' => 'OR',
            'condicion'=>1
        ]);
        Extension::create([
            'extension' => 'CB',
            'condicion'=>1
        ]);
        Extension::create([
            'extension' => 'PT',
            'condicion'=>1
        ]);
        Extension::create([
            'extension' => 'SC',
            'condicion'=>1
        ]);
        Extension::create([
            'extension' => 'BN',
            'condicion'=>1
        ]);
        Extension::create([
            'extension' => 'PA',
            'condicion'=>1
        ]);
        Extension::create([
            'extension' => 'TJ',
            'condicion'=>1
        ]);
        Extension::create([
            'extension' => 'CH',
            'condicion'=>1
        ]);
    }
}
