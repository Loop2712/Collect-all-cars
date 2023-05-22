<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPatient3ToSos1669FormYellowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sos_1669_form_yellows', function (Blueprint $table) {
            $table->string('patient_name_3')->nullable();
            $table->string('patient_age_3')->nullable();
            $table->string('patient_hn_3')->nullable();
            $table->string('patient_vn_3')->nullable();
            $table->string('delivered_province_3')->nullable();
            $table->string('delivered_hospital_3')->nullable();
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
