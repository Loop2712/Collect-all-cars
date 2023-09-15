<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVoteKanDataStationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vote_kan_data_stations', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('amphoe')->nullable();
            $table->string('area')->nullable();
            $table->string('tambon')->nullable();
            $table->string('polling_station_at')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('vote_kan_data_stations');
    }
}
