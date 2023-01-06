<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusTimeToSosHelpCentersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sos_help_centers', function (Blueprint $table) {
            $table->datetime('time_create_sos')->nullable();
            $table->datetime('time_command')->nullable();
            $table->datetime('time_go_to_help')->nullable();
            $table->datetime('time_to_the_scene')->nullable();
            $table->datetime('time_leave_the_scene')->nullable();
            $table->datetime('time_hospital')->nullable();
            $table->datetime('time_to_the_operating_base')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sos_help_centers', function (Blueprint $table) {
            //
        });
    }
}
