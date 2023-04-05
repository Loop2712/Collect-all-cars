<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForwardOperaFromToSosHelpCentersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sos_help_centers', function (Blueprint $table) {
            $table->string('command_by')->nullable();
            $table->string('forward_operation_from')->nullable();
            $table->string('forward_operation_to')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sos_help_centers', function (Blueprint $table) {
            //
        });
    }
}
