<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cancel_Profile extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cancel__profiles';

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
    protected $fillable = ['reason', 'reason_other', 'amend', 'user_id'];

    
}
