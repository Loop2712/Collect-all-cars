<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSosMapWaitDeletesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sos_map_wait_deletes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('sos_map_id')->nullable();
            $table->string('officer_id')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sos_map_wait_deletes');
    }
}
