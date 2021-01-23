<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Not_comfor extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'not_comfors';

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
    protected $fillable = ['provider_id', 'reply_provider_id', 'content', 'phone', 'want_phone'];

    
}
