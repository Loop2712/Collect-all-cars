<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Motercycle extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'motorcycles_datas';

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
    protected $fillable = ['type', 'brand', 'model', 'submodel', 'year', 'gear', 'color', 'motor', 'price', 'img', 'location', 'link', 'active', 'user_id'];

    public function productsM(){
        return $this->hasMany('App\Wishlist', 'producmoter_id'); 
    } 

}
