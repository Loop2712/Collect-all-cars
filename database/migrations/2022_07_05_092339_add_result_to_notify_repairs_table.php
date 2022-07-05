<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddResultToNotifyRepairsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('notify_repairs', function (Blueprint $table) {
            $table->string('result')->nullable();
            $table->string('annotation')->nullable();
            $table->string('send_others')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('notify_repairs', function (Blueprint $table) {
            //
        });
    }
}
