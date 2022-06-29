<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notify_repair extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'notify_repairs';

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
    protected $fillable = ['title', 'content', 'photo', 'status', 'time_wait_cf', 'time_pending', 'time_finished', 'appointment_date', 'appointment_time', 'name_staff', 'staff_id', 'condo_id', 'user_condo_id', 'building', 'category','photo_finished' ,'time_finished'];

    public function user_condo(){
        return $this->belongsTo('App\Models\User_condo', 'user_condo_id' , 'id'); 
    }
}
