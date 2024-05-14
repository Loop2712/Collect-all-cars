<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sos_1669_form_green extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sos_1669_form_greens';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sos_help_center_id',
        'sos_form_yellow_id',
        'name_helper_1',
        'name_helper_2',
        'name_helper_3',
        'name_helper_4',
        'id_helper_1',
        'id_helper_2',
        'id_helper_3',
        'id_helper_4',
        'help_result',
        'location_sos',
        'symptom',
        'name_title',
        'gender',
        'people_type',
        'people_country',
        'passport',
        'treatment_rights',
        'insurance',
        'insurance_country',
        'insurance_type_car',
        'insurance_type_license_plate',
        'insurance_province',
        'type_patient',
        'time_of_measurement_1',
        'vital_signs_t_1',
        'vital_signs_bp_1',
        'vital_signs_pr_1',
        'vital_signs_rr_1',
        'neuro_signs_e_1',
        'neuro_signs_v_1',
        'neuro_signs_m_1',
        'pupils_rt_1',
        'pupils_rtl_one_1',
        'pupils_lt_1',
        'pupils_rtl_two_1',
        'o2_sat_1',
        'dxt_1',
        'time_of_measurement_2',
        'vital_signs_t_2',
        'vital_signs_bp_2',
        'vital_signs_pr_2',
        'vital_signs_rr_2',
        'neuro_signs_e_2',
        'neuro_signs_v_2',
        'neuro_signs_m_2',
        'pupils_rt_2',
        'pupils_rtl_one_2',
        'pupils_lt_2',
        'pupils_rtl_two_2',
        'o2_sat_2',
        'dxt_2',
        'time_of_measurement_3',
        'vital_signs_t_3',
        'vital_signs_bp_3',
        'vital_signs_pr_3',
        'vital_signs_rr_3',
        'neuro_signs_e_3',
        'neuro_signs_v_3',
        'neuro_signs_m_3',
        'pupils_rt_3',
        'pupils_rtl_one_3',
        'pupils_lt_3',
        'pupils_rtl_two_3',
        'o2_sat_3',
        'dxt_3',
        'wound',
        'deformed_bone',
        'blood_loss',
        'organ',
        'internal_medicine',
        'obstetrics_and_gynecology',
        'pediatrics',
        'surgery',
        'non_treatment_others',
        'respiratory_tract',
        'wound_hemostasis',
        'fluid_resuscitation',
        'bone_splint',
        'help_revive',
        'medication_route_and_dose',
        'results_of_care',
        'rc',
        'name_hospital',
        'time_go_to_hospital',
        'type_hospital',
        'reason_choosing_hospital',
        'recorder',
        'id_recorder',
        'HN',
        'diagnosis',
        'er',
        'respiratory_tract_by_doctor',
        'respiratory_tract_by_doctor_detail',
        'hemostasis_by_doctor',
        'hemostasis_by_doctor_detail',
        'fluid_resuscitation_by_doctor',
        'fluid_resuscitation_by_doctor_detail',
        'splint_by_doctor',
        'splint_by_doctor_detail',
        'role_doctor',
        'role_other',
        'name_doctor',
        'admitted',
        'treatment_effect',
        'verified_status',
    ];

    public function sos_help_center()
    {
        return $this->belongsTo('App\Models\Sos_help_center', 'sos_help_center_id', 'id');
    }

    public function form_yellow(){
        return $this->belongsTo('App\Models\Sos_1669_form_yellow', 'sos_form_yellow_id' , 'id'); 
    }
}
