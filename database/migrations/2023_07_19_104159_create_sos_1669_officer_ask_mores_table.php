<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSos1669OfficerAskMoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sos_1669_officer_ask_mores', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('sos_id')->nullable();
            $table->string('officer_id')->nullable();
            $table->string('rc')->nullable();
            $table->string('vehicle_car')->nullable();
            $table->string('vehicle_aircraft')->nullable();
            $table->string('vehicle_boat_1')->nullable();
            $table->string('vehicle_boat_2')->nullable();
            $table->string('vehicle_boat_3')->nullable();
            $table->string('vehicle_boat_other')->nullable();
            $table->string('officer_amount')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sos_1669_officer_ask_mores');
    }
}
