<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCancelAfter6MonthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cancel_after_6_months', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name')->nullable();
            $table->string('username')->nullable();
            $table->string('email')->nullable();
            $table->string('provider_id')->nullable();
            $table->string('avatar')->nullable();
            $table->string('role')->nullable();
            $table->string('type')->nullable();
            $table->string('phone')->nullable();
            $table->string('brith')->nullable();
            $table->string('sex')->nullable();
            $table->string('ranking')->nullable();
            $table->string('driver_license')->nullable();
            $table->string('driver_license2')->nullable();
            $table->string('location_P')->nullable();
            $table->string('location_A')->nullable();
            $table->string('organization')->nullable();
            $table->string('branch')->nullable();
            $table->string('branch_district')->nullable();
            $table->string('branch_province')->nullable();
            $table->string('photo')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cancel_after_6_months');
    }
}
