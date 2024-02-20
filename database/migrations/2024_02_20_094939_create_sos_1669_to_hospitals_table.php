<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSos1669ToHospitalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sos_1669_to_hospitals', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('area')->nullable();
            $table->string('officer_hospital_id')->nullable();
            $table->string('command_id')->nullable();
            $table->string('sos_help_center_id')->nullable();
            $table->string('form_yellow_id')->nullable();
            $table->string('status')->nullable();
            $table->string('hospital_office_id')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sos_1669_to_hospitals');
    }
}
