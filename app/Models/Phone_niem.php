<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phone_niem extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'phone_niems';

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
    protected $fillable = ['province', 'phone'];

    
}
