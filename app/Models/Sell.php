<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sell extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'data_cars';

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
    protected $fillable = ["price", "type", "brand", "model", "submodel", "year", "motor", "gear", "seats", "distance", "color","image", "location", "link", "car_id_detail","clean_at","fuel"];

    public function user(){
        return $this->belongsTo('App\User', 'user_id'); 
    }
    public function product(){
        return $this->belongsTo('App\CarModel', 'id'); 
    }
}
