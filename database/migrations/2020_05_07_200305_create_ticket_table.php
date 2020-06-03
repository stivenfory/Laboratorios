<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('ticket', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->TIMESTAMP('fecha_salida');
            $table->integer('total');
            $table->UnsignedInteger('ingreso_vehiculo_id');
            $table->foreign('ingreso_vehiculo_id')->references('id')->on('vehiculos')->onDelete('cascade');         
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('ticket');
    }
}