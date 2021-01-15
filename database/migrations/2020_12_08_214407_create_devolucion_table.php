<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevolucionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devoluciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alquiler_id');
            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('personal_id')->nullable();
            $table->double('garantia_devolucion')->nullable();
            $table->dateTime('fecha_alquiler');
            $table->string('observacion');
            $table->dateTime('fecha_devolucion')->nullable();
            $table->unsignedTinyInteger('estado')->default(1);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('alquiler_id')->references('id')->on('alquileres');
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->foreign('personal_id')->references('id')->on('personals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('devoluciones');
    }
}
