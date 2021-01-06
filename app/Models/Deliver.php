<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deliver extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'delivers';

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
    protected $fillable = ['name', 'phone', 'province', 'district', 'postal_code', 'detail', 'user_id', 'provider_id', 'register_car_id'];

    
}
