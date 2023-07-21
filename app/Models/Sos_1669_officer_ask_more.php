<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sos_1669_officer_ask_more extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sos_1669_officer_ask_mores';

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
    protected $fillable = ['sos_id', 'officer_id', 'vehicle_car', 'vehicle_aircraft', 'vehicle_boat_1', 'vehicle_boat_2', 'vehicle_boat_3', 'vehicle_boat_other', 'officer_amount','success','rc_car','rc_aircraft','rc_boat_1','rc_boat_2','rc_boat_3','rc_boat_other','noti_to'];
}
