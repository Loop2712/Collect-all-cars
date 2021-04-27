<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Middle_price_car extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'middle_price_cars';

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
    protected $fillable = ['brand', 'model', 'submodel', 'year', 'price'];

    
}
