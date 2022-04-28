<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cancel_after_6_month extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cancel_after_6_months';

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
    protected $fillable = ['name', 'username', 'email', 'provider_id', 'avatar', 'role', 'type', 'phone', 'brith', 'sex', 'ranking', 'driver_license', 'driver_license2', 'location_P', 'location_A', 'organization', 'branch', 'branch_district', 'branch_province', 'photo','user_id'];

    
}
