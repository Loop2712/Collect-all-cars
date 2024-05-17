<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePrivilegesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('privileges', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('partner_id')->nullable();
            $table->string('titel')->nullable();
            $table->longText('detail')->nullable();
            $table->string('img_cover')->nullable();
            $table->string('img_content')->nullable();
            $table->string('type')->nullable();
            $table->string('redeem_type')->nullable();
            $table->string('amount_privilege')->nullable();
            $table->string('start_privilege')->nullable();
            $table->string('expire_privilege')->nullable();
            $table->string('user_view')->nullable();
            $table->string('user_click_redeem')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('privileges');
    }
}
