<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maintain_category extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'maintain_categorys';

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
    protected $fillable = ['name', 'user_id', 'area', 'line_group_id', 'status', 'count', 'color'];

    
}