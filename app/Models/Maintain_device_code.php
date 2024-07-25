<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maintain_device_code extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'maintain_device_codes';

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
    protected $fillable = ['name', 'code', 'count'];

    
}
