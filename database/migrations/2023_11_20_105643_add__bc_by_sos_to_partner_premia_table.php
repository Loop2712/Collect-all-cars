<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBcBySosToPartnerPremiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('partner_premia', function (Blueprint $table) {
            $table->string('BC_by_sos_max')->nullable();
            $table->string('BC_by_sos_sent')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('partner_premia', function (Blueprint $table) {
            //
        });
    }
}
