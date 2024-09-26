<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sos_partner_area extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sos_partner_areas';

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
    protected $fillable = ['sos_partner_id', 'creator', 'name_area', 'sos_group_line_id', 'sos_area', 'status','open_sos','open_repair','open_move','open_news'];

    
}
