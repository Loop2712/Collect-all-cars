<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVehicleTypeToData1669OperatingOfficersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('data_1669_operating_officers', function (Blueprint $table) {
            $table->string('level')->nullable();
            $table->string('vehicle_type')->nullable();
            $table->string('operating_suit_type')->nullable();
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
