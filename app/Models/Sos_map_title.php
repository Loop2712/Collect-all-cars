<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sos_map_title extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sos_map_titles';

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
    protected $fillable = ['title', 'name_partner', 'ask_to_partner', 'status','user_id','count'];

    
}
