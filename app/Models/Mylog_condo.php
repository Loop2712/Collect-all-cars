<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mylog_condo extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mylog_condos';

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
    protected $fillable = ['title', 'content', 'condo_id'];

    
}