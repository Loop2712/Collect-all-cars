<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePartnerCondosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partner_condos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name')->nullable();
            $table->string('name_line_oa')->nullable();
            $table->string('link_line_oa')->nullable();
            $table->string('channel_access_token')->nullable();
            $table->string('channel_secret')->nullable();
            $table->string('rich_menu_TH')->nullable();
            $table->string('rich_menu_EN')->nullable();
            $table->string('rich_menu_zh_TW')->nullable();
            $table->string('rich_menu_zh_CN')->nullable();
            $table->integer('partner_id')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('partner_condos');
    }
}
