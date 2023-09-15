<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVoteKanStationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vote_kan_stations', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name')->nullable();
            $table->string('province')->nullable();
            $table->string('amphoe')->nullable();
            $table->string('tambon')->nullable();
            $table->string('area')->nullable();
            $table->string('user_id')->nullable();
            $table->string('name_user')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('vote_kan_stations');
    }
}
