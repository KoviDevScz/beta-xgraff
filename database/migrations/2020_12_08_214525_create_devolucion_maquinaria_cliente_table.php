<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevolucionMaquinariaClienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_devolucion_maquinaria', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('devolucion_id');
            $table->unsignedBigInteger('maquinaria_id');
            $table->double('cantidad',8,2)->unsigned();
            $table->timestamps();
            $table->foreign('maquinaria_id')->references('id')->on('maquinarias');
            $table->foreign('devolucion_id')->references('id')->on('devoluciones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_devolucion_maquinaria');
    }
}
