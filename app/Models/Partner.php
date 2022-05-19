<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'partners';

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
    protected $fillable = ['name', 'phone', 'line_group', 'mail','sos_area','new_sos_area','user_id_admin','color','logo','color_navbar','color_body','group_line_id','name_area','class_color_menu','type_partner','full_name'];

    public function group_line(){
        return $this->hasOne('App\Models\Group_line', 'partner_id');
    }

    public function check_in(){
        return $this->hasMany('App\Models\Check_in', 'partner_id');
    }

}
