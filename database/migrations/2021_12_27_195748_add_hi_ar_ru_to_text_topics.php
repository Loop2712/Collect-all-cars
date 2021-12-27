<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHiArRuToTextTopics extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('text_topics', function (Blueprint $table) {
            $table->string('hi')->nullable();
            $table->string('ar')->nullable();
            $table->string('ru')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('text_topics', function (Blueprint $table) {
            //
        });
    }
}
