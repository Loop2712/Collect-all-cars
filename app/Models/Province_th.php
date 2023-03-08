<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province_th extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'province_ths';

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
    protected $fillable = ['province_id', 'province_name', 'province_lat', 'province_lon', 'province_zoom', 'polygon', 'count_sos_1669'];

    
}
