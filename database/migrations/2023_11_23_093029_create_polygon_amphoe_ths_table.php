<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePolygonAmphoeThsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('polygon_amphoe_ths', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('province_name')->nullable();
            $table->string('amphoe_name')->nullable();
            $table->string('amphoe_lat')->nullable();
            $table->string('amphoe_lon')->nullable();
            $table->string('amphoe_zoom')->nullable();
            $table->string('polygon')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('polygon_amphoe_ths');
    }
}
