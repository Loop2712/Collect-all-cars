<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hospital_office_service_area extends Model
{

    protected $table = 'hospital_offices_service_area';


    protected $primaryKey = 'id';


    protected $fillable = ['name'];
}
