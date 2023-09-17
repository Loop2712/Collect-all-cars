<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAmountAddScoreToVoteKanStationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vote_kan_stations', function (Blueprint $table) {
            $table->string('amount_add_score')->nullable();
            $table->string('quantity_person')->nullable();
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
