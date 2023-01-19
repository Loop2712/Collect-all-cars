<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSos1669FormYellowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sos_1669_form_yellows', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('be_notified')->nullable();
            $table->string('name_user')->nullable();
            $table->string('phone_user')->nullable();
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->string('location_sos')->nullable();
            $table->string('symptom')->nullable();
            $table->string('symptom_other')->nullable();
            $table->string('idc')->nullable();
            $table->string('vehicle_type')->nullable();
            $table->string('operation_unit_name')->nullable();
            $table->string('action_set_name')->nullable();
            $table->string('operating_suit_type')->nullable();
            $table->time('time_create_sos')->nullable();
            $table->time('time_command')->nullable();
            $table->time('time_go_to_help')->nullable();
            $table->time('time_to_the_scene')->nullable();
            $table->time('time_leave_the_scene')->nullable();
            $table->time('time_hospital')->nullable();
            $table->time('time_to_the_operating_base')->nullable();
            $table->integer('km_create_sos_to_go_to_help')->nullable();
            $table->integer('km_to_the_scene_to_leave_the_scene')->nullable();
            $table->integer('km_hospital')->nullable();
            $table->integer('km_operating_base')->nullable();
            $table->string('rc')->nullable();
            $table->string('rc_black_text')->nullable();
            $table->string('treatment')->nullable();
            $table->string('sub_treatment')->nullable();
            $table->string('patient_name_1')->nullable();
            $table->string('patient_age_1')->nullable();
            $table->string('patient_hn_1')->nullable();
            $table->string('patient_vn_1')->nullable();
            $table->string('delivered_province_1')->nullable();
            $table->string('delivered_hospital_1')->nullable();
            $table->string('patient_name_2')->nullable();
            $table->string('patient_age_2')->nullable();
            $table->string('patient_hn_2')->nullable();
            $table->string('patient_vn_2')->nullable();
            $table->string('delivered_province_2')->nullable();
            $table->string('delivered_hospital_2')->nullable();
            $table->string('submission_criteria')->nullable();
            $table->string('communication_hospital')->nullable();
            $table->string('registration_category')->nullable();
            $table->string('registration_number')->nullable();
            $table->string('registration_province')->nullable();
            $table->string('owner_registration')->nullable();
            $table->string('sos_help_center_id')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sos_1669_form_yellows');
    }
}
