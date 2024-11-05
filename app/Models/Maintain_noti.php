<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maintain_noti extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'maintain_notis';

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
    protected $fillable = ['name_user', 'maintain_notified_user_id', 'user_id', 'partner_id', 'name_area', 'detail_location', 'title', 'detail_title', 'category_id', 'sub_category_id', 'photo', 'status', 'priority', 'name_officer', 'officer_id', 'device_code', 'device_code_id', 'datetime_command', 'datetime_start', 'datetime_end', 'datetime_success', 'material', 'repair_costs', 'photo_repair_costs', 'remark_user', 'remark_officer', 'remark_admin', 'rating_maintain', 'rating_operation', 'rating_impression', 'rating_sum', 'rating_remark'];

    public function maintain_categories(){
        return $this->belongsTo('App\Models\Maintain_category', 'category_id' ,'id');
    }
}
