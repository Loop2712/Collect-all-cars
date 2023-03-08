<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProvinceThsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('province_ths', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('province_id')->nullable();
            $table->string('province_name')->nullable();
            $table->string('province_lat')->nullable();
            $table->string('province_lon')->nullable();
            $table->string('province_zoom')->nullable();
            $table->string('polygon')->nullable();
            $table->string('count_sos_1669')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('province_ths');
    }
}
