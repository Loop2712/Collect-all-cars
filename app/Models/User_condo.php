<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_condo extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_condos';

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
    protected $fillable = ['name', 'last_name', 'phone', 'name_condo', 'building', 'floor', 'room_number', 'rich_menu_language', 'user_id', 'condo_id'];

    public function parcel(){
        return $this->hasMany('App\Models\Parcel', 'user_condo_id');
    }
}
