<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRegisteredToVoteKanDataStationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vote_kan_data_stations', function (Blueprint $table) {
            $table->string('not_registered')->nullable();
            $table->string('registered')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vote_kan_data_stations', function (Blueprint $table) {
            //
        });
    }
}
