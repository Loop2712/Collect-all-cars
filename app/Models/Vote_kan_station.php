<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vote_kan_station extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'vote_kan_stations';

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
    protected $fillable = ['name', 'province', 'amphoe', 'tambon', 'area', 'user_id', 'name_user','phone','phone_2','polling_station_at','amount_add_score','quantity_person'];

    public function vote_kan_score(){
        return $this->hasMany('App\Models\Vote_kan_score', 'vote_kan_stations_id');
    }

    
}
