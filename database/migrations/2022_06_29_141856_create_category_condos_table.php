<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoryCondosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_condos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name_category')->nullable();
            $table->string('system')->nullable();
            $table->integer('condo_id')->nullable();
            $table->string('name_staff')->nullable();
            $table->integer('staff_id')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('category_condos');
    }
}
