<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'organizations';

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
    protected $fillable = ['juristicID', 'juristicNameTH', 'juristicNameEN', 'juristicType', 'registerDate', 'juristicStatus', 'registerCapital', 'standardObjective', 'standardObjectiveDetail', 'addressDetail', 'addressName', 'buildingName', 'roomNo', 'floor', 'villageName', 'houseNumber', 'moo', 'soi', 'street', 'subDistrict', 'sdistrict', 'province'];

    public function register_cars(){
        return $this->hasMany('App\Models\Register_car', 'organization_id');
    }
    
}
