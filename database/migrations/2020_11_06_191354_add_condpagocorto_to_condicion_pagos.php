<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCondpagocortoToCondicionPagos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('condicion_pagos', function (Blueprint $table) {
            $table->string('condpagocorto',100)->nullable()->after('condicionpago');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('condicion_pagos', function (Blueprint $table) {
            $table->dropColumn('condpagocorto');
        });
    }
}
