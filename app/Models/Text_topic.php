<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Text_topic extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'text_topics';

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
    protected $fillable = ['th', 'en', 'zh_TW', 'ja', 'ko', 'es'];

    
}
