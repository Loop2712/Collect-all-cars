<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Check_in extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'check_ins';

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
    protected $fillable = ['user_id', 'time_in', 'time_out', 'check_in_at', 'student_id'];

    public function user(){
        return $this->belongsTo('App\User', 'user_id' , 'id'); 
    }
    
}
