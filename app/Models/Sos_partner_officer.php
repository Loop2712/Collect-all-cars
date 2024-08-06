<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sos_partner_officer extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sos_partner_officers';

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
    protected $fillable = ['full_name', 'phone', 'department', 'position', 'sos_partner_id', 'user_id', 'role', 'active', 'status_officer'];

    
}
