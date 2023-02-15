<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeOperatingSuitTypeColumnsToData1669OperatingOfficersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('data_1669_operating_officers', function (Blueprint $table) {
            $table->dropColumn('operating_suit_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('data_1669_operating_officers', function (Blueprint $table) {
            //
        });
    }
}
