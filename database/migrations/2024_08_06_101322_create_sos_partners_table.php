<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSosPartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sos_partners', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('mail')->nullable();
            $table->longText('logo')->nullable();
            $table->string('color_main')->nullable();
            $table->string('color_navbar')->nullable();
            $table->string('color_body')->nullable();
            $table->string('class_color_menu')->nullable();
            $table->string('type_partner')->nullable();
            $table->longText('full_name')->nullable();
            $table->string('show_homepage')->nullable();
            $table->string('secret_token')->nullable();
            $table->string('open_sos')->nullable();
            $table->string('open_repair')->nullable();
            $table->string('open_move')->nullable();
            $table->string('open_news')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sos_partners');
    }
}
