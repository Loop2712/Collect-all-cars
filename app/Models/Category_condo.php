<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category_condo extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'category_condos';

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
    protected $fillable = ['name_category', 'system', 'condo_id', 'name_staff', 'staff_id'];

    
}
