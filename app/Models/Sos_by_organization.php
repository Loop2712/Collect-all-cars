<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sos_by_organization extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sos_by_organizations';

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
    protected $fillable = ['name_partner', 'partner_id', 'name_sub_organization', 'phone', 'group_line_id'];

    
}
