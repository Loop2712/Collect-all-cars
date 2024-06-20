<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddWoundHemostasisAndOrganToSos1669FormPinksTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sos_1669_form_pinks', function (Blueprint $table) {
            $table->text('wound_hemostasis')->nullable(); // ใช้ TEXT แทน VARCHAR
            $table->text('organ')->nullable(); // ใช้ TEXT แทน VARCHAR
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
        Schema::table('sos_1669_form_pinks', function (Blueprint $table) {
            //
        });
    }
}
