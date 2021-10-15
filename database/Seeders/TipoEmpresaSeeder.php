<?php

use App\TipoEmpresa;
use Illuminate\Database\Seeder;

class TipoEmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoEmpresa::create(['tipoempresa' => 'Autónomo']);
        TipoEmpresa::create(['tipoempresa' => 'Pyme']);
        TipoEmpresa::create(['tipoempresa' => 'Gran Empresa']);
        TipoEmpresa::create(['tipoempresa' => 'Contacto']);
    }
}
