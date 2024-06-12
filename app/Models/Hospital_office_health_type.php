<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hospital_office_health_type extends Model
{

    protected $table = 'hospital_offices_health_type';


    protected $primaryKey = 'id';


    protected $fillable = ['name'];
}
