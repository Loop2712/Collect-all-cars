<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('car_id')->nullable();
            $table->text('namecar')->nullable();
            $table->integer('brand_id')->nullable();
            $table->integer('generat_id')->nullable();
            $table->float('price')->nullable();
            $table->integer('year')->nullable();
            $table->text('address')->nullable();
            $table->integer('Mileage')->nullable();
            $table->string('picture')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cars');
    }
}
