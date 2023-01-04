<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sub_organization extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sub_organizations';

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
    protected $fillable = ['name_sub_organization', 'phone', 'name_partner', 'id_partner'];

    
}
