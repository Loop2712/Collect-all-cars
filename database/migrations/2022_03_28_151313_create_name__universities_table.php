<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNameUniversitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('name__universities', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('full_name_th')->nullable();
            $table->string('full_name_en')->nullable();
            $table->string('initials_th')->nullable();
            $table->integer('initials_en')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('name__universities');
    }
}
