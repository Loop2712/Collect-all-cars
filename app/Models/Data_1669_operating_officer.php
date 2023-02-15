<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Data_1669_operating_officer extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'data_1669_operating_officers';

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
    protected $fillable = ['name_officer', 'lat', 'lng', 'operating_unit_id', 'user_id','status','go_to_help','refuse','level','vehicle_type','operating_suit_type'];

    public function operating_unit(){
        return $this->belongsTo('App\Models\Data_1669_operating_unit', 'operating_unit_id' , 'id'); 
    }

}
