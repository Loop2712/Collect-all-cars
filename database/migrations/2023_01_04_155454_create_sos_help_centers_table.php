<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSosHelpCentersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sos_help_centers', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->string('photo_sos')->nullable();
            $table->string('name_user')->nullable();
            $table->string('phone_user')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('organization_helper')->nullable();
            $table->string('name_helper')->nullable();
            $table->integer('partner_id')->nullable();
            $table->integer('helper_id')->nullable();
            $table->integer('score_impression')->nullable();
            $table->integer('score_period')->nullable();
            $table->float('score_total')->nullable();
            $table->string('commemt_help')->nullable();
            $table->string('photo_succeed')->nullable();
            $table->string('photo_succeed_by')->nullable();
            $table->string('remark_helper')->nullable();
            $table->string('notify')->nullable();
            $table->string('status')->nullable();
            $table->dateTime('help_complete_time')->nullable();
            $table->dateTime('time_go_to_help')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sos_help_centers');
    }
}
