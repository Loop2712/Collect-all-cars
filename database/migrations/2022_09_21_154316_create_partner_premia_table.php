<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePartnerPremiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partner_premia', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name_partner')->nullable();
            $table->integer('id_partner')->nullable();
            $table->string('level')->nullable();
            $table->string('BC_by_car_max')->nullable();
            $table->string('BC_by_car_sent')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('partner_premia');
    }
}
