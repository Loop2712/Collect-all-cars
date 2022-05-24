<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nationality extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'nationalities';

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
    protected $fillable = ['country', 'nationality', 'nationality_noun', 'language'];

    
}
