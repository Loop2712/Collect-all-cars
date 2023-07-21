<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sos_1669_form_yellow extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sos_1669_form_yellows';

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
    protected $fillable = ['be_notified', 'name_user', 'phone_user', 'lat', 'lng', 'location_sos', 'symptom', 'symptom_other', 'idc', 'vehicle_type', 'operation_unit_name', 'action_set_name', 'operating_suit_type', 'time_create_sos', 'time_command', 'time_go_to_help', 'time_to_the_scene', 'time_leave_the_scene', 'time_hospital', 'time_to_the_operating_base', 'km_create_sos_to_go_to_help', 'km_to_the_scene_to_leave_the_scene', 'km_hospital', 'km_operating_base', 'rc', 'rc_black_text', 'treatment', 'sub_treatment', 'patient_name_1', 'patient_age_1', 'patient_hn_1', 'patient_vn_1', 'delivered_province_1', 'delivered_hospital_1', 'patient_name_2', 'patient_age_2', 'patient_hn_2', 'patient_vn_2', 'delivered_province_2', 'delivered_hospital_2', 'patient_name_3', 'patient_age_3', 'patient_hn_3', 'patient_vn_3', 'delivered_province_3', 'delivered_hospital_3', 'submission_criteria', 'communication_hospital', 'registration_category', 'registration_number', 'registration_province', 'owner_registration','sos_help_center_id'];

    public function sos_help_center(){
        return $this->belongsTo('App\Models\Sos_help_center', 'sos_help_center_id' , 'id'); 
    }
}
