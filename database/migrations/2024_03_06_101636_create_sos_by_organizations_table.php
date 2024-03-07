<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSosByOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sos_by_organizations', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name_partner')->nullable();
            $table->integer('partner_id')->nullable();
            $table->string('name_sub_organization')->nullable();
            $table->string('phone')->nullable();
            $table->integer('group_line_id')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sos_by_organizations');
    }
}
