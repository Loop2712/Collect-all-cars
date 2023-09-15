<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPhoneToVoteKanStationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vote_kan_stations', function (Blueprint $table) {
            $table->string('phone')->nullable();
            $table->string('phone_2')->nullable();
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
        Schema::table('vote_kan_stations', function (Blueprint $table) {
            //
        });
    }
}
