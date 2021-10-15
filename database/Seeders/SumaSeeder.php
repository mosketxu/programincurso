<?php

use App\Suma;
use Illuminate\Database\Seeder;


class SumaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Suma::create([
            'nombre' => 'Marta',
            'tfno'=>'659501389',
            'email'=>'marta.ruiz@sumaempresa.com'
            ]);
        Suma::create([
            'nombre' => 'Susana',
            'tfno'=>'',
            'email'=>'susana.martinez@sumaempresa.com'
            ]);
        Suma::create([
            'nombre' => 'Alex',
            'tfno'=>'638122614',
            'email'=>'alex.arregui@sumaempresa.com'
            ]);
        Suma::create([
            'nombre' => 'Dolors',
            'tfno'=>'',
            'email'=>'dolors.celdran@sumaempresa.com'
            ]);
        Suma::create([
            'nombre' => 'Miriam',
            'tfno'=>'',
            'email'=>'miriam.marin@sumaempresa.com'
            ]);
    }
}
