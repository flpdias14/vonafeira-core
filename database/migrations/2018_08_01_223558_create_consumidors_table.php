<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsumidorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consumidors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('consumidor_id')->unsigned();
            $table->foreign('consumidor_id')->references('id')->on('users');
            $table->integer('grupoconsumo_id')->unsigned();
            $table->foreign('grupoconsumo_id')->references('id')->on('grupo_consumos');
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
        Schema::dropIfExists('consumidors');
    }
}
