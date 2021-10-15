<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->string('empresa');
            $table->string('alias',0)->nullable();
            $table->boolean('favorito',0)->default(0);
            $table->string('tipoempresa',25);
            $table->string('direccion',100)->nullable();
            $table->string('codpostal',10)->nullable();
            $table->string('localidad',100)->nullable();
            $table->string('provincia_id')->nullable();
            $table->string('pais_id', 2)->default('ES');
            $table->string('nif',12)->nullable();
            $table->string('tfno',50)->nullable();
            $table->string('emailgral',100)->nullable();
            $table->string('emailadm',100)->nullable();
            $table->string('web',100)->nullable();
            $table->string('idioma', 2)->default('ES');
            $table->string('periodoimpuesto_id',50)->default(0);
            $table->integer('condicionpago_id')->default(1);
            $table->integer('periodofacturacion_id')->default(2);
            $table->integer('diafactura')->default(1);
            $table->integer('diavencimiento')->default(10);
            $table->string('referenciacliente',30)->nullable();
            $table->string('conceptofacturacionprincipal',200)->nullable();
            $table->float('importefacturacionprincipal')->default(0);
            $table->string('conceptofacturacionsecundario',200)->nullable();
            $table->float('importefacturacionsecundario')->default(0);
            $table->float('tipoiva')->default(0.21);
            $table->float('porcentajemarta')->default(100);
            $table->float('porcentajesusana')->default(0);
            $table->string('cuentacontable',10)->nullable();
            $table->string('banco')->nullable();
            $table->string('iban')->nullable();
            $table->string('observaciones')->nullable();
            // $table->string('contactosuma')->default('marta.ruiz@sumaempresa.com')->nullable();
            $table->unsignedBigInteger('suma_id')->default('1');
            $table->foreign('suma_id')->references('id')->on('suma')->onDelete('cascade');

            $table->string('cliente')->default('1');
            $table->boolean('estado')->default('1');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresas');
    }
}
