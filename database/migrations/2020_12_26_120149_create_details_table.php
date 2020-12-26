<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('price')->nullable();
            $table->string('type')->nullable();
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->string('face')->nullable();
            $table->string('submodel')->nullable();
            $table->string('year')->nullable();
            $table->string('motor')->nullable();
            $table->string('gear')->nullable();
            $table->string('seats')->nullable();
            $table->string('distance')->nullable();
            $table->string('color')->nullable();
            $table->string('image')->nullable();
            $table->integer('car_id')->nullable();
            $table->string('location')->nullable();
            $table->string('link')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('details');
    }
}
