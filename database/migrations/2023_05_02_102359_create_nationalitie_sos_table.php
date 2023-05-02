<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNationalitieSosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nationalitie_sos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->string('name_user')->nullable();
            $table->string('phone_user')->nullable();
            $table->integer('id_user')->nullable();
            $table->string('nationalities_user')->nullable();
            $table->string('language_user')->nullable();
            $table->string('organization_helper')->nullable();
            $table->string('name_helper')->nullable();
            $table->string('phone_helper')->nullable();
            $table->integer('id_helper')->nullable();
            $table->string('organization_other')->nullable();
            $table->integer('id_data_sos')->nullable();
            $table->string('detail_sos')->nullable();
            $table->string('status')->nullable();
            $table->string('name_officer')->nullable();
            $table->string('phone_officer')->nullable();
            $table->integer('id_officer')->nullable();
            $table->integer('score_impression_officer')->nullable();
            $table->integer('score_period_officer')->nullable();
            $table->float('score_total_officer')->nullable();
            $table->string('comment_officer')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('nationalitie_sos');
    }
}
