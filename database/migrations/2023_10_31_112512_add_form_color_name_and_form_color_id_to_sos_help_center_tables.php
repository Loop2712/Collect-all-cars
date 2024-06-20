<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFormColorNameAndFormColorIdToSosHelpCenterTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sos_help_centers', function (Blueprint $table) {
            $table->text('form_color_name')->nullable(); 
            $table->text('form_color_id_user_1')->nullable();
            $table->text('form_color_id_user_2')->nullable();
            $table->text('form_color_id_user_3')->nullable();
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
