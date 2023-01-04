<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sos_help_center extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sos_help_centers';

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
    protected $fillable = ['lat', 'lng', 'photo_sos', 'name_user', 'phone_user', 'user_id', 'organization_helper', 'name_helper', 'partner_id', 'helper_id', 'score_impression', 'score_period', 'score_total', 'commemt_help', 'photo_succeed', 'photo_succeed_by', 'remark_helper', 'notify', 'status', 'help_complete_time', 'time_go_to_help'];

    
}
