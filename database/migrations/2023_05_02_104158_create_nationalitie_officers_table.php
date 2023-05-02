<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNationalitieOfficersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nationalitie_officers', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name_officer')->nullable();
            $table->string('phone_officer')->nullable();
            $table->string('photo_officer')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('group_line_id')->nullable();
            $table->string('all_case')->nullable();
            $table->float('score_per_case')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('nationalitie_officers');
    }
}
