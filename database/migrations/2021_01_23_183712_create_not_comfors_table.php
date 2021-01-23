<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNotComforsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('not_comfors', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('provider_id')->nullable();
            $table->string('reply_provider_id')->nullable();
            $table->string('content')->nullable();
            $table->string('phone')->nullable();
            $table->string('want_phone')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('not_comfors');
    }
}
