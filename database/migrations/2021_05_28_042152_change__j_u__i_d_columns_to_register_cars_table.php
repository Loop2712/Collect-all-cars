<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeJUIDColumnsToRegisterCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('register_cars', function (Blueprint $table) {
            $table->renameColumn('juristicID', 'juristicNameTH');
            $table->string('branch')->nullable();
            $table->string('branch_district')->nullable();
            $table->string('branch_province')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('register_cars', function (Blueprint $table) {
            //
        });
    }
}
