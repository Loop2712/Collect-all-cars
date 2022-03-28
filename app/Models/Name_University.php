<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Name_University extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'name__universities';

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
    protected $fillable = ['full_name_th', 'full_name_en', 'initials_th', 'initials_en'];

    
}
