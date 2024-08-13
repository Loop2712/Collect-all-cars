<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSosPartnerAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sos_partner_areas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('sos_partner_id')->nullable();
            $table->string('creator')->nullable();
            $table->string('name_area')->nullable();
            $table->string('group_line_id')->nullable();
            $table->longText('sos_area')->nullable();
            $table->string('status')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sos_partner_areas');
    }
}
