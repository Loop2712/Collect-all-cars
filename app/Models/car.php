<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class car extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cars';

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
    protected $fillable = ['id', 'namecar', 'brand_id', 'generat_id', 'price', 'year', 'address', 'Mileage', 'picture'];

    
}
