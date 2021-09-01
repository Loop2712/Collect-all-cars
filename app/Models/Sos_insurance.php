<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sos_insurance extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sos_insurances';

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
    protected $fillable = ['name', 'phone', 'lat', 'lng', 'insurance', 'user_id','car_id'];

    
}
