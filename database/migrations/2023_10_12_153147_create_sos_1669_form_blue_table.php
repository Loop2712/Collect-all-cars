<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSos1669FormBlueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sos_1669_form_blues', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('sos_help_center_id')->nullable();
            $table->string('sos_form_yellow_id')->nullable(); //ดึงข้อมูลมาใส่ข้อ 2

            // ข้อ 1
            $table->string('name_helper_1')->nullable();
            $table->string('name_helper_2')->nullable();
            $table->string('name_helper_3')->nullable();
            $table->string('name_helper_4')->nullable();
            $table->string('id_helper_1')->nullable();
            $table->string('id_helper_2')->nullable();
            $table->string('id_helper_3')->nullable();
            $table->string('id_helper_4')->nullable();
            $table->string('help_result')->nullable();
            $table->string('location_sos')->nullable();
            $table->string('symptom')->nullable();
           
              // ข้อ 3
              // $table->text('name_title_2')->nullable();
              // $table->text('name_title_3')->nullable();
              // $table->text('name')->nullable();
              // $table->text('age')->nullable();
              // $table->text('gender_2')->nullable();
              // $table->text('gender_3')->nullable();
              
              // $table->text('people_type_2')->nullable();
              // $table->text('people_type_3')->nullable();
              // $table->text('id_card')->nullable();
            $table->text('name_title')->nullable();
            $table->text('gender')->nullable();
            $table->text('people_type')->nullable();
            $table->text('people_country')->nullable();
            $table->text('passport')->nullable();
            $table->text('treatment_rights')->nullable();

            // $table->text('people_country_2')->nullable();
            // $table->text('passport_2')->nullable();
            // $table->text('treatment_rights_2')->nullable();

            // $table->text('people_country_3')->nullable();
            // $table->text('passport_3')->nullable();
            // $table->text('treatment_rights_3')->nullable();
             
            $table->string('insurance')->nullable();
            $table->string('insurance_country')->nullable();
            $table->string('insurance_type_car')->nullable();
            $table->string('insurance_type_license_plate')->nullable();
            $table->string('insurance_province')->nullable();
            $table->string('type_patient')->nullable();
            $table->string('consciousness')->nullable();
            $table->string('breathing')->nullable();
            $table->string('deformed_bone')->nullable();
            $table->string('wound')->nullable();
            $table->string('respiratory_tract')->nullable();
            $table->string('bone_splint')->nullable();
            $table->string('help_revive')->nullable();
            $table->string('results_of_care')->nullable();

            // ข้อ 4
            $table->string('name_hospital')->nullable();
            $table->string('time_go_to_hospital')->nullable();
            $table->string('type_hospital')->nullable();
            $table->string('reason_choosing_hospital')->nullable();
            $table->string('recorder')->nullable();
            $table->string('id_recorder')->nullable();

            // ข้อ 5
            $table->string('HN')->nullable();
            $table->string('diagnosis')->nullable();
            $table->string('er')->nullable();
            $table->string('respiratory_tract_by_doctor')->nullable();
            $table->string('respiratory_tract_by_doctor_detail')->nullable();
            $table->string('hemostasis_by_doctor')->nullable();
            $table->string('hemostasis_by_doctor_detail')->nullable();
            $table->string('splint_by_doctor')->nullable();
            $table->string('splint_by_doctor_detail')->nullable();
            $table->string('role_doctor')->nullable();
            $table->string('role_other')->nullable();
            $table->string('name_doctor')->nullable();

            // ข้อ 6
            $table->string('admitted')->nullable();
            $table->string('treatment_effect')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sos_1669_form_blues');
    }
}
