<?php

namespace Database\Seeders;

use App\Impuesto;
use Illuminate\Database\Seeder;

class ImpuestoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Impuesto::create(['id' => '303','modelo'=>'M303','impuesto'=>'IVA. Autoliquidación.','periodo_id'=>'13']);
        // Impuesto::create(['id' => '390','modelo'=>'M390','impuesto'=>'IVA. Declaración Resumen Anual.','periodo_id'=>'12']);
        // Impuesto::create(['id' => '111','modelo'=>'M111','impuesto'=>'Retenciones e ingresos a cuenta. Rendimientos del trabajo y de actividades económicas, premios y determinadas ganancias patrimoniales e imputaciones de Renta. Autoliquidación.','periodo_id'=>'13']);
        // Impuesto::create(['id' => '190','modelo'=>'M190','impuesto'=>'Declaración Informativa. Retenciones e ingresos a cuenta. Rendimientos del trabajo y de actividades económicas, premios y determinadas ganancias patrimoniales e imputaciones de rentas. Resumen anual.','periodo_id'=>'12']);
        // Impuesto::create(['id' => '115','modelo'=>'M115','impuesto'=>'Retenciones e ingresos a cuenta. Rentas o rendimientos procedentes del arrendamiento o subarrendamiento de inmuebles urbanos.','periodo_id'=>'13']);
        // Impuesto::create(['id' => '180','modelo'=>'M180','impuesto'=>'Declaración Informativa. Retenciones e ingresos a cuenta. Rendimientos procedentes del arrendamiento de inmuebles urbanos. Resumen anual.','periodo_id'=>'12']);
        // Impuesto::create(['id' => '130','modelo'=>'M130','impuesto'=>'IRPF. Empresarios y profesionales en Estimación Directa. Pago fraccionado.','periodo_id'=>'13']);
        // Impuesto::create(['id' => '200','modelo'=>'M200','impuesto'=>'Impuesto sobre Sociedades e Impuesto sobre la Renta de no Residentes. Documentos de ingreso o devolución.','periodo_id'=>'12']);
        Impuesto::create(['id' => '202','modelo'=>'M202','impuesto'=>'IS Impuesto sobre Sociedades e Impuesto sobre la Renta de no Residentes (establecimientos permanentes y entidades en régimen de atribución de rentas constituidas en el extranjero con presencia en territorio español). Pago Fraccionado','periodo_id'=>'34']);
        Impuesto::create(['id' => '210','modelo'=>'M210','impuesto'=>'IRNR. Impuesto sobre la Renta de no Residentes sin establecimiento permanente.','periodo_id'=>'13']);
        Impuesto::create(['id' => '216','modelo'=>'M216','impuesto'=>'IRNR. Impuesto sobre la Renta de no Residentes. Rentas obtenidas sin mediación de establecimiento permanente. Retenciones e ingresos a cuenta','periodo_id'=>'12']);
        Impuesto::create(['id' => '232','modelo'=>'M232','impuesto'=>'Declaración informativa de operaciones vinculadas y de operaciones y situaciones relacionadas con países o territorios calificados como paraísos fiscales','periodo_id'=>'12']);
        Impuesto::create(['id' => '349','modelo'=>'M349','impuesto'=>'Declaración Informativa. Declaración recapitulativa de operaciones intracomunitarias.','periodo_id'=>'13']);
        Impuesto::create(['id' => '347  ','modelo'=>'M347','impuesto'=>'Declaración Informativa. Declaración anual de operaciones con terceras personas.','periodo_id'=>'12']);
        Impuesto::create(['id' => '1','modelo'=>'CCAA','impuesto'=>'Deposito Digital Cuentas Anuales','periodo_id'=>'12']);
        Impuesto::create(['id' => '2','modelo'=>'Legalizacion','impuesto'=>'Legalizacion de libro','periodo_id'=>'12']);
        Impuesto::create(['id' => '3','modelo'=>'Renta','impuesto'=>'Renta','periodo_id'=>'12']);
    }
}
