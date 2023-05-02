<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nationalitie_so extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'nationalitie_sos';

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
    protected $fillable = ['lat', 'lng', 'name_user', 'phone_user', 'id_user', 'nationalities_user', 'language_user', 'organization_helper', 'name_helper', 'phone_helper', 'id_helper', 'organization_other', 'id_data_sos', 'detail_sos', 'status', 'name_officer', 'phone_officer', 'id_officer', 'score_impression_officer', 'score_period_officer', 'score_total_officer', 'comment_officer'];

    
}
