<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vote_kan_data_station extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'vote_kan_data_stations';

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
    protected $fillable = ['amphoe', 'area', 'tambon', 'polling_station_at','not_registered' ,'registered'];

    
}
