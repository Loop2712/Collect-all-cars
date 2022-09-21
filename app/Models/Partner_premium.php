<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner_premium extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'partner_premia';

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
    protected $fillable = ['name_partner', 'id_partner', 'level', 'BC_by_car_max', 'BC_by_car_sent'];

    
}
