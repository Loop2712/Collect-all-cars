<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sos_help_center extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sos_help_centers';

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
    protected $fillable = ['lat', 'lng', 'photo_sos', 'name_user', 'phone_user', 'user_id', 'organization_helper', 'name_helper', 'partner_id', 'helper_id', 'score_impression', 'score_period', 'score_total', 'comment_help', 'photo_succeed', 'remark_helper', 'notify', 'status','create_by','time_create_sos','time_command','time_go_to_help','time_to_the_scene','time_leave_the_scene','time_hospital','time_to_the_operating_base','remark_status','operating_code','photo_sos_by_officers','wait','refuse','time_sos_success','address','remark_photo_sos','command_by','forward_operation_from','forward_operation_to','nationalities_id'];

    public function form_yellow(){
        return $this->hasOne('App\Models\Sos_1669_form_yellow', 'sos_help_center_id');
    }

    public function operating_unit(){
        return $this->belongsTo('App\Models\Data_1669_operating_unit', 'operating_unit_id' , 'id'); 
    }

    public function operating_officer(){
        return $this->belongsTo('App\Models\Data_1669_operating_officer', 'helper_id' , 'user_id'); 
    }

    public function officers_user(){
        return $this->belongsTo('App\User', 'helper_id' , 'id'); 
    }

    public function officers_command_by(){
        return $this->belongsTo('App\Models\Data_1669_officer_command', 'command_by' , 'id'); 
    }



    // เชื่อมกับตัวเอง
    public function forwardOperation_to()
    {
        return $this->belongsTo(Sos_help_center::class, 'forward_operation_to');
    }
    public function forwardOperation_from()
    {
        return $this->belongsTo(Sos_help_center::class, 'forward_operation_from');
    }

}
