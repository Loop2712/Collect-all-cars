<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVoteKanScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vote_kan_scores', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('vote_kan_stations_id')->nullable();
            $table->string('user_id')->nullable();
            $table->string('last')->nullable();
            $table->integer('number_1')->nullable();
            $table->integer('number_2')->nullable();
            $table->integer('number_3')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('vote_kan_scores');
    }
}
