<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maintain_sub_category extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'maintain_sub_categorys';

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
    protected $fillable = ['name', 'category_id', 'user_id', 'status', 'count'];

    public function maintain_categories(){
        return $this->belongsTo('App\Models\Maintain_category', 'category_id' ,'id');
    }

}
