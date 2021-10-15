<?php

namespace Database\Seeders;

use App\Ciclo;
use Illuminate\Database\Seeder;

class CicloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ciclo::create(['id' => '0','ciclo' => 'No def']);
        Ciclo::create(['id' => '1','ciclo' => 'Mensual']);
        Ciclo::create(['id' => '3','ciclo' => 'Trimestral']);
        Ciclo::create(['id' => '34','ciclo' => 'Tri/Cuatri']);
        Ciclo::create(['id' => '13','ciclo' => 'Mes/Trim']);
        Ciclo::create(['id' => '12','ciclo' => 'Anual']);
        Ciclo::create(['id' => '20','ciclo' => 'Puntual']);
    }
}
