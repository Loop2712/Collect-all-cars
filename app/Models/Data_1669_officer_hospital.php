<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Data_1669_officer_hospital extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'data_1669_officer_hospitals';

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
    protected $fillable = ['name_officer_hospital', 'user_id', 'hospital_offices_id', 'area', 'creator', 'status'];

    
}
