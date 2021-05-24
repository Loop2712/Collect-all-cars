<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('juristicID')->nullable();
            $table->string('juristicNameTH')->nullable();
            $table->string('juristicNameEN')->nullable();
            $table->string('juristicType')->nullable();
            $table->string('registerDate')->nullable();
            $table->string('juristicStatus')->nullable();
            $table->string('registerCapital')->nullable();
            $table->string('standardObjective')->nullable();
            $table->string('standardObjectiveDetail')->nullable();
            $table->string('addressDetail')->nullable();
            $table->string('addressName')->nullable();
            $table->string('buildingName')->nullable();
            $table->string('roomNo')->nullable();
            $table->string('floor')->nullable();
            $table->string('villageName')->nullable();
            $table->string('houseNumber')->nullable();
            $table->string('moo')->nullable();
            $table->string('soi')->nullable();
            $table->string('street')->nullable();
            $table->string('subDistrict')->nullable();
            $table->string('sdistrict')->nullable();
            $table->string('province')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('organizations');
    }
}
