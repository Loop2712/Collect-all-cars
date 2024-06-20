<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVerifiedStatusFormColorAndVerifiedStatusFormYellowToSosHelpCenterTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sos_help_centers', function (Blueprint $table) {
            //
            $table->text('verified_form_color')->nullable(); //ยืนยันตั้งเบิกฟอร์มสี
            $table->text('verified_form_yellow')->nullable(); //ยืนยันตั้งเบิกฟอร์มเหลือง

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
