<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
      /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = "data_cars";

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = "id";

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ["price", "type", "brand", "model", "submodel", "year", "motor", "gear", "seats", "distance", "color","image", "location", "link", "car_id_detail","clean_at","fuel"];

    public function products(){
        return $this->hasMany('App\Models\Wishlist', 'product_id','id'); 
    } 
    // public function sell(){
    //     return $this->hasMany('App\Sell', 'id'); 
    // } 

}
