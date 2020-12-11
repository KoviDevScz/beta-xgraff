<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlquilerMaquinariaClienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_alquiler_maquinaria_cliente', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alquiler_id');
            $table->unsignedBigInteger('maquinaria_id');
            $table->double('cantidad',8,2)->unsigned();
            $table->double('monto',8,2)->unsigned();
            $table->dateTime('fecha_devolucion')->date_format('d-y-M');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('alquiler_id')->references('id')->on('alquileres');
            $table->foreign('maquinaria_id')->references('id')->on('maquinarias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_alquiler_maquinaria_cliente');
    }
}
