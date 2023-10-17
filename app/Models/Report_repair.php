<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report_repair extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'report_repair';

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
    protected $fillable = ['sos_map_id', 'how_to_fix' ,'link'];

    public function sos_map()
    {
        return $this->belongsTo('App\Models\Sos_map', 'sos_map_id', 'id');
    }
}
