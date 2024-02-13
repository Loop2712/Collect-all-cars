<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateData1669OfficerHospitalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_1669_officer_hospitals', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name_officer_hospital')->nullable();
            $table->string('user_id')->nullable();
            $table->string('hospital_offices_id')->nullable();
            $table->string('area')->nullable();
            $table->string('creator')->nullable();
            $table->string('status')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('data_1669_officer_hospitals');
    }
}
