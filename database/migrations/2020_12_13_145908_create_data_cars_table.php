<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_cars', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('price')->nullable();
            $table->string('type')->nullable();
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->string('submodel')->nullable();
            $table->integer('year')->nullable();
            $table->string('motor')->nullable();
            $table->string('gear')->nullable();
            $table->integer('seats')->nullable();
            $table->string('distance')->nullable();
            $table->string('color')->nullable();
            $table->string('image')->nullable();
            $table->string('location')->nullable();
            $table->string('link')->nullable();
            $table->integer('car_id_detail')->nullable();
            $table->timestamp('clean_at')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_cars');
    }
}
