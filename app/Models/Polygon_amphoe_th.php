<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Polygon_amphoe_th extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'polygon_amphoe_ths';

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
    protected $fillable = ['province_name', 'amphoe_name', 'amphoe_lat', 'amphoe_lon', 'amphoe_zoom', 'polygon'];

    
}
