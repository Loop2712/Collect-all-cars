<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRedeemCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('redeem_codes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('redeem_code')->nullable();
            $table->integer('privilege_id')->nullable();
            $table->string('status')->nullable();
            $table->dateTime('time_update_status')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('redeem_codes');
    }
}
