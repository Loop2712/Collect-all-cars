<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Redeem_code extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'redeem_codes';

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
    protected $fillable = ['redeem_code', 'privilege_id', 'status', 'time_update_status'];

    
}
