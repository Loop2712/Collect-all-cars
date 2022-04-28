<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRegisterCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('register_cars', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('brand')->nullable();
            $table->string('generation')->nullable();
            $table->string('year')->nullable();
            $table->string('registration_number')->nullable();
            $table->string('province')->nullable();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('register_cars');
    }
}
