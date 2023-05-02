<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nationalitie_group_line extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'nationalitie_group_lines';

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
    protected $fillable = ['groupId', 'groupName', 'pictureUrl', 'language', 'id_nationalitie'];

    
}
