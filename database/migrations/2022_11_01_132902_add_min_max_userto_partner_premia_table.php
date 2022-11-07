<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMinMaxUsertoPartnerPremiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('partner_premia', function (Blueprint $table) {
            $table->string('BC_by_check_in_max')->nullable();
            $table->string('BC_by_check_in_sent')->nullable();
            $table->string('BC_by_user_max')->nullable();
            $table->string('BC_by_user_sent')->nullable();
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
