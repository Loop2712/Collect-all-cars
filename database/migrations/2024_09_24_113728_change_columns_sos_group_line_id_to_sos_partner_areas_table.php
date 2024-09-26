<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnsSosGroupLineIdToSosPartnerAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sos_partner_areas', function (Blueprint $table) {
            $table->renameColumn('group_line_id', 'sos_group_line_id');
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
