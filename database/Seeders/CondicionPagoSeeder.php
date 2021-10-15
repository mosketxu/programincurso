<?php

namespace Database\Seeders;

use App\CondicionPago;
use Illuminate\Database\Seeder;

class CondicionPagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CondicionPago::create(['condicionpago' => 'Transferencia IBAN: ES50 0081 0033 0000 0166 6572','condpagocorto'=>'Transferencia']);
        CondicionPago::create(['condicionpago' => 'Recibo Domiciliado','condpagocorto'=>'Recibo']);
        CondicionPago::create(['condicionpago' => 'No Definida','condpagocorto'=>'No.Def']);
        CondicionPago::create(['condicionpago' => 'No Aplica','condpagocorto'=>'No Aplica']);
    }
}
