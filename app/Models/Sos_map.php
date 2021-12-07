<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sos_map extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sos_maps';

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
    protected $fillable = ['content', 'name', 'phone', 'lat', 'lng', 'area', 'user_id','photo','CountryCode','helper','helper_id','organization_helper'];

    
}
