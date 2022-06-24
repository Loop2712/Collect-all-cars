<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parcel extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'parcels';

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
    protected $fillable = ['photo', 'name_staff', 'time_in', 'time_out', 'staff_id', 'condo_id', 'user_condo_id'];

    
}
