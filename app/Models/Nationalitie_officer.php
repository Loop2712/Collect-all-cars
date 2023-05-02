<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nationalitie_officer extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'nationalitie_officers';

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
    protected $fillable = ['name_officer', 'phone_officer', 'photo_officer', 'user_id', 'group_line_id', 'all_case', 'score_per_case'];

    
}
