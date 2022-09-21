<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdsContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads_contents', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name_content')->nullable();
            $table->string('detail')->nullable();
            $table->string('link')->nullable();
            $table->string('photo')->nullable();
            $table->string('type_content')->nullable();
            $table->string('name_partner')->nullable();
            $table->integer('id_partner')->nullable();
            $table->string('show_user')->nullable();
            $table->string('user_click')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ads_contents');
    }
}
