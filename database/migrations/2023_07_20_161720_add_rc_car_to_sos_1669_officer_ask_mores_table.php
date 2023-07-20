<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRcCarToSos1669OfficerAskMoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sos_1669_officer_ask_mores', function (Blueprint $table) {
            $table->dropColumn('rc');
            $table->string('rc_car')->nullable();
            $table->string('rc_aircraft')->nullable();
            $table->string('rc_boat_1')->nullable();
            $table->string('rc_boat_2')->nullable();
            $table->string('rc_boat_3')->nullable();
            $table->string('rc_boat_other')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sos_1669_officer_ask_mores', function (Blueprint $table) {
            //
        });
    }
}
