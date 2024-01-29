<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hospital_office extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'hospital_offices';

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
    protected $fillable = ['code_9_digit', 'code_5_digit', 'code_11_digit','name', 'organization_type', 'health_type', 'affiliation', 'department', 'actual_bed', 'usage_status', 'service_area', 'address', 'province', 'district', 'sub_district', 'village', 'zip_code', 'server', 'founding_date', 'closing_date', 'latest_update','lat','lng'];

    
}
