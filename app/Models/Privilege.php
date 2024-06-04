<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Privilege extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'privileges';

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
    protected $fillable = ['partner_id', 'titel', 'detail', 'img_cover', 'img_content', 'type', 'redeem_type', 'amount_privilege', 'start_privilege', 'expire_privilege', 'user_view', 'user_click_redeem'];

    public function partner(){
        return $this->belongsTo('App\Models\Partner', 'partner_id' , 'id'); 
    }
}
