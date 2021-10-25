<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DP_tu_student extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'd_p_tu_students';

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
    protected $fillable = ['name', 'last_name', 'faculty', 'department', 'student_id', 'status_line', 'user_id'];

    
}
