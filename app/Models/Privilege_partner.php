<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Privilege_partner extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'privilege_partners';

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
    protected $fillable = ['name', 'logo', 'status','mail','phone'];

    public function privilege(){
        return $this->hasMany('App\Models\Privilege', 'partner_id');
    }

}
