<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maintain_category extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'maintain_categorys';

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
    protected $fillable = ['name', 'user_id', 'area_id', 'line_group_id', 'status', 'count', 'color'];

    public function maintain_notis(){
        return $this->hasMany('App\Models\Maintain_noti', 'category_id' , 'id');
    }

    public function maintain_sub_categories() {
        return $this->hasMany('App\Models\Maintain_sub_category', 'category_id');
    }

}
