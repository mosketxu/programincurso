<?php

use Illuminate\Database\Seeder;

class ProvinciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('provincias')->delete();

        DB::table('provincias')->insert([
        ['id'=>'01','provincia'=>'ALABA'],
        ['id'=>'02','provincia'=>'ALBACETE'],
        ['id'=>'03','provincia'=>'ALICANTE'],
        ['id'=>'04','provincia'=>'ALMERÍA'],
        ['id'=>'05','provincia'=>'ÁVILA'],
        ['id'=>'06','provincia'=>'BADAJOZ'],
        ['id'=>'07','provincia'=>'BALEARES'],
        ['id'=>'08','provincia'=>'BARCELONA'],
        ['id'=>'09','provincia'=>'BURGOS'],
        ['id'=>'10','provincia'=>'CÁCERES'],
        ['id'=>'11','provincia'=>'CÁDIZ'],
        ['id'=>'12','provincia'=>'CASTELLÓN'],
        ['id'=>'13','provincia'=>'C.REAL'],
        ['id'=>'14','provincia'=>'CÓRDOBA'],
        ['id'=>'15','provincia'=>'A CORUÑA'],
        ['id'=>'16','provincia'=>'CUENCA'],
        ['id'=>'17','provincia'=>'GIRONA'],
        ['id'=>'18','provincia'=>'GRANADA'],
        ['id'=>'19','provincia'=>'GUADALAJARA'],
        ['id'=>'20','provincia'=>'GUIPÚZCOA'],
        ['id'=>'21','provincia'=>'HUELVA'],
        ['id'=>'22','provincia'=>'HUESCA'],
        ['id'=>'23','provincia'=>'JAÉN'],
        ['id'=>'24','provincia'=>'LEÓN',],
        ['id'=>'25','provincia'=>'LLEIDA'],
        ['id'=>'26','provincia'=>'LA RIOJA'],
        ['id'=>'27','provincia'=>'LUGO'],
        ['id'=>'28','provincia'=>'MADRID'],
        ['id'=>'29','provincia'=>'MÁLAGA'],
        ['id'=>'30','provincia'=>'MURCIA'],
        ['id'=>'31','provincia'=>'NAVARRA'],
        ['id'=>'32','provincia'=>'ORENSE'],
        ['id'=>'33','provincia'=>'ASTURIAS'],
        ['id'=>'34','provincia'=>'PALENCIA'],
        ['id'=>'35','provincia'=>'CANARIAS'],
        ['id'=>'36','provincia'=>'PONTEVEDRA'],
        ['id'=>'37','provincia'=>'SALAMANCA'],
        ['id'=>'38','provincia'=>'TENERIFE'],
        ['id'=>'39','provincia'=>'SANTANDER'],
        ['id'=>'40','provincia'=>'SEGOVIA'],
        ['id'=>'41','provincia'=>'SEVILLA'],
        ['id'=>'42','provincia'=>'SORIA',],
        ['id'=>'43','provincia'=>'TARRAGONA'],
        ['id'=>'44','provincia'=>'TERUEL'],
        ['id'=>'45','provincia'=>'TOLEDO'],
        ['id'=>'46','provincia'=>'VALENCIA'],
        ['id'=>'47','provincia'=>'VALLADOLID'],
        ['id'=>'48','provincia'=>'VIZCAYA'],
        ['id'=>'49','provincia'=>'ZAMORA'],
        ['id'=>'50','provincia'=>'ZARAGOZA'],
        ['id'=>'51','provincia'=>'CEUTA'],
        ['id'=>'52','provincia'=>'MELILLA'],
        ['id'=>'57','provincia'=>'ANDORRA'],
        ]);

    }
}
