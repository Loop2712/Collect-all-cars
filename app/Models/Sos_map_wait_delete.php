<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sos_map_wait_delete extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sos_map_wait_deletes';

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
    protected $fillable = ['sos_map_id', 'officer_id'];

    public function sos_map()
    {
        return $this->belongsTo('App\Models\Sos_map', 'sos_map_id', 'id');
    }
}
