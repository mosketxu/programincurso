<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvclisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provclis', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->bigInteger('categoria_id')->nullable();
            $table->string('codpostal',10)->nullable();
            $table->string('localidad',100)->nullable();
            $table->string('provincia_id')->nullable();
            $table->string('pais_id', 2)->default('ES');
            $table->string('nif',12)->nullable();
            $table->string('tfno',15)->nullable();
            $table->string('email',100)->nullable();
            $table->string('banco1',200)->nullable();
            $table->string('iban1',200)->nullable();
            $table->string('banco2',200)->nullable(); 
            $table->string('iban2',200)->nullable();
            $table->decimal('irpf', 15, 2)->default(0);
            $table->string('observaciones')->nullable();
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
        Schema::dropIfExists('provclis');
    }
}
