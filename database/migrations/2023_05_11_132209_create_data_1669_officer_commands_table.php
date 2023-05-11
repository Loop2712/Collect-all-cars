<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateData1669OfficerCommandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_1669_officer_commands', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name_officer_command')->nullable();
            $table->string('user_id')->nullable();
            $table->string('area')->nullable();
            $table->string('officer_role')->nullable();
            $table->string('number')->nullable();
            $table->string('status')->nullable();
            $table->string('creator')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('data_1669_officer_commands');
    }
}
