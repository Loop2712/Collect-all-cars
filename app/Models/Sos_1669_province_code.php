<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sos_1669_province_code extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sos_1669_province_codes';

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
    protected $fillable = ['area_code', 'province_code', 'province_name', 'district_code', 'district_name', 'sub_district_code', 'sub_district_name', 'count_sos'];

    
}
