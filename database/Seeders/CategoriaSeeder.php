<?php

namespace Database\Seeders;

use App\Categoria;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create(['id'=>'1','categoria' => 'Contabilidad']);
        Categoria::create(['id'=>'3','categoria' => 'Amortización']);
        Categoria::create(['id'=>'10','categoria' => 'Alquiler']);
        Categoria::create(['id'=>'12','categoria' => 'Profesionales']);
        Categoria::create(['id'=>'14','categoria' => 'Nominas']);
        Categoria::create(['id'=>'16','categoria' => 'Autónomos']);
        Categoria::create(['id'=>'20','categoria' => 'Suministros']);
        Categoria::create(['id'=>'22','categoria' => 'Leasing']);
        Categoria::create(['id'=>'30','categoria' => 'Gastos Negocio']);
        Categoria::create(['id'=>'35','categoria' => 'Otros Gastos']);
        Categoria::create(['id'=>'40','categoria' => 'Desplazamiento']);
        Categoria::create(['id'=>'45','categoria' => 'Dietas']);
        Categoria::create(['id'=>'100','categoria' => 'Ventas']);
    }
}
