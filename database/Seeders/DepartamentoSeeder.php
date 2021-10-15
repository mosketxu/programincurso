<?php

namespace Database\Seeders;

use App\Departamento;
use Illuminate\Database\Seeder;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Departamento::create(['departamento' => '-']);
        Departamento::create(['departamento' => 'Marketing']);
        Departamento::create(['departamento' => 'Comercial']);
        Departamento::create(['departamento' => 'Administración']);
        Departamento::create(['departamento' => 'Contabilidad']);
        Departamento::create(['departamento' => 'Dirección']);
        Departamento::create(['departamento' => 'Retail Team']);
        Departamento::create(['departamento' => 'Fiscal Reports']);
        Departamento::create(['departamento' => 'Laboral']);
    }
}
