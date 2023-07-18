<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agora_chat extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'agora_chats';

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
    protected $fillable = ['room_for', 'time_start', 'member_in_room', 'total_timemeet', 'than_2_people_timemeet', 'detail', 'sos_id', 'consult_doctor_id'];

    
}
