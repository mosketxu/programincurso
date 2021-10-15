<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PeriodosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('periodos')->delete();

        DB::table('periodos')->insert([
            ['id'=>'1','tipo'=>'0','perI'=>'1','perF'=>'1','periodo'=>'Enero'],
            ['id'=>'2','tipo'=>'0','perI'=>'2','perF'=>'2','periodo'=>'Febrero'],
            ['id'=>'3','tipo'=>'0','perI'=>'3','perF'=>'3','periodo'=>'Marzo'],
            ['id'=>'4','tipo'=>'0','perI'=>'4','perF'=>'4','periodo'=>'Abril'],
            ['id'=>'5','tipo'=>'0','perI'=>'5','perF'=>'5','periodo'=>'Mayo'],
            ['id'=>'6','tipo'=>'0','perI'=>'6','perF'=>'6','periodo'=>'Junio'],
            ['id'=>'7','tipo'=>'0','perI'=>'7','perF'=>'7','periodo'=>'Julio'],
            ['id'=>'8','tipo'=>'0','perI'=>'8','perF'=>'8','periodo'=>'Agosto'],
            ['id'=>'9','tipo'=>'0','perI'=>'9','perF'=>'9','periodo'=>'Septiembre'],
            ['id'=>'10','tipo'=>'0','perI'=>'10','perF'=>'10','periodo'=>'Octubre'],
            ['id'=>'11','tipo'=>'0','perI'=>'11','perF'=>'11','periodo'=>'Noviembre'],
            ['id'=>'12','tipo'=>'0','perI'=>'12','perF'=>'12','periodo'=>'Diciembre'],
            ['id'=>'13','tipo'=>'1','perI'=>'1','perF'=>'3','periodo'=>'T1'],
            ['id'=>'14','tipo'=>'1','perI'=>'4','perF'=>'6','periodo'=>'T2'],
            ['id'=>'15','tipo'=>'1','perI'=>'7','perF'=>'9','periodo'=>'T3'],
            ['id'=>'16','tipo'=>'1','perI'=>'10','perF'=>'12','periodo'=>'T4']
        ]);
    }
}
