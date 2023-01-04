<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSubOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_organizations', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name_sub_organization')->nullable();
            $table->string('phone')->nullable();
            $table->string('name_partner')->nullable();
            $table->string('id_partner')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sub_organizations');
    }
}
