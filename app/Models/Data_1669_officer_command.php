<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Data_1669_officer_command extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'data_1669_officer_commands';

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
    protected $fillable = ['name_officer_command', 'user_id', 'area', 'officer_role', 'number', 'status', 'creator'];

    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id'); 
    }
    
}
