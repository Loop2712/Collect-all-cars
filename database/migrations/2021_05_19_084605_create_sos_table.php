<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('disaster')->nullable();
            $table->integer('car_fire')->nullable();
            $table->integer('life_saving')->nullable();
            $table->integer('js_100')->nullable();
            $table->integer('highway')->nullable();
            $table->integer('tourist_police')->nullable();
            $table->integer('total')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sos');
    }
}
