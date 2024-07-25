<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner_officer extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'partner_officers';

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
    protected $fillable = ['name', 'user_id', 'partner_id', 'status', 'department', 'position'];

    
}
