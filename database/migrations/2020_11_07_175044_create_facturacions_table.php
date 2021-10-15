<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturacions', function (Blueprint $table) {
            $table->id();
            $table->string('factura',9)->index()->nullable();
            $table->date('fechafactura')->nullable();
            $table->foreignId('empresa_id')->constrained('empresas');
            $table->date('fechavto')->nullable();
            $table->foreignId('condpago_id')->constrained('condicion_pagos');
            $table->date('fechacontabilizado')->nullable();
            $table->boolean('contabilizado')->default('0');
            $table->string('emailconta')->nullable();
            $table->boolean('enviarmail')->default(1);
            $table->boolean('mailenviado')->default(0);
            $table->boolean('pagada')->default(0);
            $table->string('refcliente',50)-> nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facturacions');
    }
}
