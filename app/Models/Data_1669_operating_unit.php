<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Data_1669_operating_unit extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'data_1669_operating_units';

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
    protected $fillable = ['name', 'area', 'level'];

    public function operating_officers(){
        return $this->hasMany('App\Models\Data_1669_operating_officer', 'operating_unit_id');
    }
}
