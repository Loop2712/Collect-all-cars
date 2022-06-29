<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNotifyRepairsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notify_repairs', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('title')->nullable();
            $table->string('content')->nullable();
            $table->string('photo')->nullable();
            $table->string('status')->nullable();
            $table->dateTime('time_wait_cf')->nullable();
            $table->dateTime('time_pending')->nullable();
            $table->dateTime('time_finished')->nullable();
            $table->string('appointment_date')->nullable();
            $table->string('appointment_time')->nullable();
            $table->string('name_staff')->nullable();
            $table->integer('staff_id')->nullable();
            $table->integer('condo_id')->nullable();
            $table->integer('user_condo_id')->nullable();
            $table->string('building')->nullable();
            $table->string('category')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('notify_repairs');
    }
}
