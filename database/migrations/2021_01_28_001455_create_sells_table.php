<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSellsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sells', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('price')->nullable();
            $table->string('type')->nullable();
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->string('submodel')->nullable();
            $table->string('year')->nullable();
            $table->string('motor')->nullable();
            $table->string('gear')->nullable();
            $table->string('seats')->nullable();
            $table->string('distance')->nullable();
            $table->string('color')->nullable();
            $table->string('image')->nullable();
            $table->string('location')->nullable();
            $table->string('fuel')->nullable();
            $table->integer('user_id')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sells');
    }
}
