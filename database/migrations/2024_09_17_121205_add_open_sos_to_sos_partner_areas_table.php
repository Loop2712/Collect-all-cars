<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOpenSosToSosPartnerAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sos_partner_areas', function (Blueprint $table) {
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
        Schema::table('sos_partner_areas', function (Blueprint $table) {
            //
        });
    }
}
