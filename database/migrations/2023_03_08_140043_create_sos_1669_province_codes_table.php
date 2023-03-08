<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSos1669ProvinceCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sos_1669_province_codes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('area_code')->nullable();
            $table->string('province_code')->nullable();
            $table->string('province_name')->nullable();
            $table->string('district_code')->nullable();
            $table->string('district_name')->nullable();
            $table->string('sub_district_code')->nullable();
            $table->string('sub_district_name')->nullable();
            $table->string('count_sos')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sos_1669_province_codes');
    }
}
