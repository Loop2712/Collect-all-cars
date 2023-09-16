<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vote_kan_score extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'vote_kan_scores';

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
    protected $fillable = ['vote_kan_stations_id', 'user_id', 'last', 'number_1', 'number_2', 'number_3','amphoe'];

    
}
