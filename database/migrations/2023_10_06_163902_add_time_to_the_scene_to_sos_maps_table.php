<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTimeToTheSceneToSosMapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sos_maps', function (Blueprint $table) {
            $table->dateTime('time_to_the_scene')->nullable();
            $table->dateTime('time_leave_the_scene')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sos_maps', function (Blueprint $table) {
            //
        });
    }
}
