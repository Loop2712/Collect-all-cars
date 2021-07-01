<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'guests';

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
    protected $fillable = ['name', 'phone', 'masseng', 'massengbox', 'photo', 'provider_id','brand' ,'registration' , 'county', 'reply_provider_id' , 'user_id', 'type','report_drivingd_detail','register_car_id','organization'];

    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id'); 
    }
    
     public function register_cars(){
        return $this->belongsTo('App\Models\Register_car', 'register_car_id' , 'id'); 
    }
}
