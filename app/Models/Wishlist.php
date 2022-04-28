<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'wishlists';

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
    protected $fillable = ['product_id', 'user_id', 'price','producmoter_id','car_type'];

    public function user(){
        return $this->belongsTo('App\User', 'user_id' , 'id'); 
    }

    public function products(){
        return $this->belongsTo('App\CarModel', 'product_id','id'); 
    }

    public function productM(){
        return $this->belongsTo('App\Models\Motercycle', 'producmoter_id','id'); 
    }

}
