<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserCondosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_condos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('name_condo')->nullable();
            $table->string('building')->nullable();
            $table->string('floor')->nullable();
            $table->string('room_number')->nullable();
            $table->string('rich_menu_language')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('condo_id')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_condos');
    }
}
