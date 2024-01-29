<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHospitalOfficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospital_offices', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('code_9_digit')->nullable();
            $table->string('code_5_digit')->nullable();
            $table->string('code_11_digit')->nullable();
            $table->string('name')->nullable();
            $table->string('organization_type')->nullable();
            $table->string('health_type')->nullable();
            $table->string('affiliation')->nullable();
            $table->string('department')->nullable();
            $table->string('actual_bed')->nullable();
            $table->string('usage_status')->nullable();
            $table->string('service_area')->nullable();
            $table->string('address')->nullable();
            $table->string('province')->nullable();
            $table->string('district')->nullable();
            $table->string('sub_district')->nullable();
            $table->string('village')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('server')->nullable();
            $table->string('founding_date')->nullable();
            $table->string('closing_date')->nullable();
            $table->string('latest_update')->nullable();
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('hospital_offices');
    }
}
