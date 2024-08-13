<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sos_partner extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sos_partners';

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
    protected $fillable = ['name', 'phone', 'mail', 'logo', 'color_main', 'color_navbar', 'color_body', 'class_color_menu', 'type_partner', 'full_name', 'show_homepage', 'secret_token', 'open_sos', 'open_repair', 'open_move', 'open_news'];

    
}
