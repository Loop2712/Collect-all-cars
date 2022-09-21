<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ads_content extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ads_contents';

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
    protected $fillable = ['name_content', 'detail', 'link', 'photo', 'type_content', 'name_partner', 'id_partner', 'show_user', 'user_click'];

    
}
