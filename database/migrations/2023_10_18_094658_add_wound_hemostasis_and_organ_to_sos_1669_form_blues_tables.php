<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddWoundHemostasisAndOrganToSos1669FormBluesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sos_1669_form_blues', function (Blueprint $table) {
            $table->text('wound_hemostasis')->nullable(); //บาดแผล/ห้ามเลือด
            $table->text('organ')->nullable(); //อวัยวะ
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
        Schema::table('sos_1669_form_blues', function (Blueprint $table) {
            //
        });
    }
}
