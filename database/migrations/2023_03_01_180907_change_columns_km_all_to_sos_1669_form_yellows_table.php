<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnsKmAllToSos1669FormYellowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sos_1669_form_yellows', function (Blueprint $table) {
            $table->float('km_create_sos_to_go_to_help', 8, 2)->nullable()->change();
            $table->float('km_to_the_scene_to_leave_the_scene', 8, 2)->nullable()->change();
            $table->float('km_hospital', 8, 2)->nullable()->change();
            $table->float('km_operating_base', 8, 2)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sos_1669_form_yellows', function (Blueprint $table) {
            //
        });
    }
}
