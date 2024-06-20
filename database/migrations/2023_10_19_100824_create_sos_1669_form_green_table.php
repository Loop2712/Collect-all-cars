<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSos1669FormGreenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sos_1669_form_greens', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('sos_help_center_id')->nullable();
            $table->text('sos_form_yellow_id')->nullable(); //ดึงข้อมูลมาใส่ข้อ 2
      
            // ข้อ 1
            $table->text('name_helper_1')->nullable();
            $table->text('name_helper_2')->nullable();
            $table->text('name_helper_3')->nullable();
            $table->text('name_helper_4')->nullable();
            $table->text('id_helper_1')->nullable();
            $table->text('id_helper_2')->nullable();
            $table->text('id_helper_3')->nullable();
            $table->text('id_helper_4')->nullable();
            $table->text('help_result')->nullable();
            $table->text('location_sos')->nullable();
            $table->text('symptom')->nullable();
            
            // ข้อ 3
            $table->text('name_title')->nullable();
            $table->text('gender')->nullable();
            $table->text('people_type')->nullable();
            $table->text('people_country')->nullable();
            $table->text('passport')->nullable();
            $table->text('treatment_rights')->nullable();
            
            $table->text('insurance')->nullable();
            $table->text('insurance_country')->nullable();
            $table->text('insurance_type_car')->nullable();
            $table->text('insurance_type_license_plate')->nullable();
            $table->text('insurance_province')->nullable();
            $table->text('type_patient')->nullable();
            $table->text('time_of_measurement_1')->nullable();
            $table->text('vital_signs_t_1')->nullable();
            $table->text('vital_signs_bp_1')->nullable();
            $table->text('vital_signs_pr_1')->nullable();
            $table->text('vital_signs_rr_1')->nullable();
            $table->text('neuro_signs_e_1')->nullable();
            $table->text('neuro_signs_v_1')->nullable();
            $table->text('neuro_signs_m_1')->nullable();
            $table->text('pupils_rt_1')->nullable();
            $table->text('pupils_rtl_one_1')->nullable();
            $table->text('pupils_lt_1')->nullable();
            $table->text('pupils_rtl_two_1')->nullable();
            $table->text('o2_sat_1')->nullable();
            $table->text('dxt_1')->nullable();
            $table->text('time_of_measurement_2')->nullable();
            $table->text('vital_signs_t_2')->nullable();
            $table->text('vital_signs_bp_2')->nullable();
            $table->text('vital_signs_pr_2')->nullable();
            $table->text('vital_signs_rr_2')->nullable();
            $table->text('neuro_signs_e_2')->nullable();
            $table->text('neuro_signs_v_2')->nullable();
            $table->text('neuro_signs_m_2')->nullable();
            $table->text('pupils_rt_2')->nullable();
            $table->text('pupils_rtl_one_2')->nullable();
            $table->text('pupils_lt_2')->nullable();
            $table->text('pupils_rtl_two_2')->nullable();
            $table->text('o2_sat_2')->nullable();
            $table->text('dxt_2')->nullable();
            $table->text('time_of_measurement_3')->nullable();
            $table->text('vital_signs_t_3')->nullable();
            $table->text('vital_signs_bp_3')->nullable();
            $table->text('vital_signs_pr_3')->nullable();
            $table->text('vital_signs_rr_3')->nullable();
            $table->text('neuro_signs_e_3')->nullable();
            $table->text('neuro_signs_v_3')->nullable();
            $table->text('neuro_signs_m_3')->nullable();
            $table->text('pupils_rt_3')->nullable();
            $table->text('pupils_rtl_one_3')->nullable();
            $table->text('pupils_lt_3')->nullable();
            $table->text('pupils_rtl_two_3')->nullable();
            $table->text('o2_sat_3')->nullable();
            $table->text('dxt_3')->nullable();
      
            $table->text('wound')->nullable(); //บาดแผล
            $table->text('deformed_bone')->nullable(); //กระดูกผิดรูป
            $table->text('blood_loss')->nullable(); //การเสียเลือด
            $table->text('organ')->nullable(); //อวัยวะ
      
            $table->text('internal_medicine')->nullable(); //อายุรกรรม
            $table->text('obstetrics_and_gynecology')->nullable(); //สูติ-นรีเวชฯ
            $table->text('pediatrics')->nullable(); //กุมารฯ
            $table->text('surgery')->nullable(); //ศัลยกรรม
            $table->text('non_treatment_others')->nullable(); //อื่นๆ
      
            $table->text('respiratory_tract')->nullable(); //ทางเดินหายใจ/การหายใจ
            $table->text('wound_hemostasis')->nullable(); //บาดแผล/ห้ามเลือด
            $table->text('fluid_resuscitation')->nullable(); //การให้สารน้ำ
            $table->text('bone_splint')->nullable(); //การดามกระดูก
            $table->text('help_revive')->nullable(); //ช่วยฟื้นคืนชีพ
      
            $table->text('medication_route_and_dose')->nullable(); //ยา (วิธีใช้ และขนาด ให้ระบุ)
            $table->text('results_of_care')->nullable(); //ผลการดูแลรักษาเบื้องต้น
            $table->text('rc')->nullable(); //ระดับการคัดแยก RC Code
      
            // ข้อ 4
            $table->text('name_hospital')->nullable();
            $table->text('time_go_to_hospital')->nullable();
            $table->text('type_hospital')->nullable();
            $table->text('reason_choosing_hospital')->nullable();
            $table->text('recorder')->nullable();
            $table->text('id_recorder')->nullable();
      
            // ข้อ 5
            $table->text('HN')->nullable();
            $table->text('diagnosis')->nullable();
            $table->text('er')->nullable();
            $table->text('respiratory_tract_by_doctor')->nullable();
            $table->text('respiratory_tract_by_doctor_detail')->nullable();
            $table->text('hemostasis_by_doctor')->nullable();
            $table->text('hemostasis_by_doctor_detail')->nullable();
            $table->text('fluid_resuscitation_by_doctor')->nullable(); //การให้สารน้ำ
            $table->text('fluid_resuscitation_by_doctor_detail')->nullable(); //การให้สารน้ำ
            $table->text('splint_by_doctor')->nullable();
            $table->text('splint_by_doctor_detail')->nullable();
            $table->text('role_doctor')->nullable();
            $table->text('role_other')->nullable();
            $table->text('name_doctor')->nullable();
      
            // ข้อ 6
            $table->text('admitted')->nullable();
            $table->text('treatment_effect')->nullable();
            

            $table->text('verified_status')->nullable(); //ยืนยันตั้งเบิก

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sos_1669_form_greens');
    }
}
