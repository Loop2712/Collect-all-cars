<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCancelProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cancel__profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('reason')->nullable();
            $table->string('reason_other')->nullable();
            $table->string('amend')->nullable();
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
        Schema::drop('cancel__profiles');
    }
}
