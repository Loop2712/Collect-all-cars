<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGoToHelpToData1669OperatingOfficersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('data_1669_operating_officers', function (Blueprint $table) {
            $table->integer('go_to_help')->nullable();
            $table->integer('refuse')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('data_1669_operating_officers', function (Blueprint $table) {
            //
        });
    }
}
