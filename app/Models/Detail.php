<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'details';

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
    protected $fillable = ['price', 'type', 'brand', 'model', 'face', 'submodel', 'year', 'motor', 'gear', 'seats', 'distance', 'color', 'image', 'car_id', 'location', 'link'];

    
}
