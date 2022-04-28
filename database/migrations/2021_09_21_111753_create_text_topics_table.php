<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTextTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('text_topics', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('th')->nullable();
            $table->string('en')->nullable();
            $table->string('zh_TW')->nullable();
            $table->string('ja')->nullable();
            $table->string('ko')->nullable();
            $table->string('es')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('text_topics');
    }
}
