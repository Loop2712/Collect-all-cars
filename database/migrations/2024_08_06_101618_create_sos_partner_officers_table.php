<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSosPartnerOfficersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sos_partner_officers', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('full_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('department')->nullable();
            $table->string('position')->nullable();
            $table->string('sos_partner_id')->nullable();
            $table->string('user_id')->nullable();
            $table->string('role')->nullable();
            $table->string('active')->nullable();
            $table->string('status_officer')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sos_partner_officers');
    }
}
