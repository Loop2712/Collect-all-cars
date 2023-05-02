<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNationalitieGroupLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nationalitie_group_lines', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('groupId')->nullable();
            $table->string('groupName')->nullable();
            $table->string('pictureUrl')->nullable();
            $table->string('language')->nullable();
            $table->string('id_nationalitie')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('nationalitie_group_lines');
    }
}
