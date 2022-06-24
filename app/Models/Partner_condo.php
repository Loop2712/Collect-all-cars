<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner_condo extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'partner_condos';

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
    protected $fillable = ['name', 'name_line_oa', 'link_line_oa', 'channel_access_token', 'channel_secret', 'rich_menu_TH', 'rich_menu_EN', 'rich_menu_zh_TW', 'rich_menu_zh_CN', 'partner_id' ,'rich_menu_admin'];

    public function partner(){
        return $this->belongsTo('App\Models\Partner', 'partner_id' , 'id'); 
    }
}
