<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Problem_report extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'problem_reports';

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
    protected $fillable = ['image', 'description', 'status', 'user_id', 'solution', 'remark','photo_success'];

    
}
