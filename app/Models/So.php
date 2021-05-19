<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class So extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sos';

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
    protected $fillable = ['disaster', 'car_fire', 'life_saving', 'js_100', 'highway', 'tourist_police', 'total'];

    
}
