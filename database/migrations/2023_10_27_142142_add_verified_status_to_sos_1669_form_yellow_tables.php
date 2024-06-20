<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVerifiedStatusToSos1669FormYellowTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sos_1669_form_yellows', function (Blueprint $table) {
            $table->text('verified_status')->nullable(); //ยืนยันตั้งเบิก
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
