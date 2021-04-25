<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMiddlePriceCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('middle_price_cars', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->string('submodel')->nullable();
            $table->string('year')->nullable();
            $table->string('price')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('middle_price_cars');
    }
}
