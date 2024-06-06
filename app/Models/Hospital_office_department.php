<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hospital_office_department extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'hospital_offices_department';

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
    protected $fillable = ['name'];
}
