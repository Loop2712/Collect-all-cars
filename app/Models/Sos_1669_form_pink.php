<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sos_1669_form_pink extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sos_1669_form_pinks';

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
        'sos_help_center_id', 'sos_form_yellow_id', 'name_helper_1', 'name_helper_2', 'name_helper_3', 'name_helper_4', 'id_helper_1', 'id_helper_2', 'id_helper_3', 'id_helper_4', 'help_result', 'location_sos', 'symptom', 'name_title_1','gender_1','people_type_1','people_country_1','passport_1','treatment_rights_1','name_title_2','gender_2','people_type_2','people_country_2','passport_2','treatment_rights_2','name_title_3','gender_3','people_type_3','people_country_3','passport_3','treatment_rights_3', 'insurance', 'insurance_country', 'insurance_type_car', 'insurance_type_license_plate', 'insurance_province', 'type_patient', 'time_of_measurement', 'vital_signs_t', 'vital_signs_bp', 'vital_signs_pr', 'vital_signs_rr', 'neuro_signs_e', 'neuro_signs_v', 'neuro_signs_m', 'dxt', 'consciousness', 'breathing', 'deformed_bone', 'wound', 'respiratory_tract', 'bone_splint', 'help_revive', 'results_of_care', 'name_hospital', 'time_go_to_hospital', 'type_hospital', 'reason_choosing_hospital', 'recorder', 'id_recorder', 'HN', 'diagnosis', 'er', 'respiratory_tract_by_doctor', 'respiratory_tract_by_doctor_detail', 'hemostasis_by_doctor', 'hemostasis_by_doctor_detail', 'splint_by_doctor', 'splint_by_doctor_detail', 'role_doctor', 'role_other', 'name_doctor', 'admitted', 'treatment_effect', 'verified_status'
    ];

    public function sos_help_center()
    {
        return $this->belongsTo('App\Models\Sos_help_center', 'sos_help_center_id', 'id');
    }

    public function form_yellow(){
        return $this->belongsTo('App\Models\Sos_1669_form_yellow', 'sos_form_yellow_id' , 'id'); 
    }
}
