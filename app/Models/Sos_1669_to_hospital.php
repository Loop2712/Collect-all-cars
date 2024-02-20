<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sos_1669_to_hospital extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sos_1669_to_hospitals';

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
    protected $fillable = ['area', 'officer_hospital_id', 'command_id', 'sos_help_center_id', 'form_yellow_id', 'status','hospital_office_id'];

    
}
