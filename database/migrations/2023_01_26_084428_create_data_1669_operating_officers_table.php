<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateData1669OperatingOfficersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_1669_operating_officers', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name_officer')->nullable();
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->string('operating_unit_id')->nullable();
            $table->string('user_id')->nullable();
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
        Schema::drop('data_1669_operating_officers');
    }
}
