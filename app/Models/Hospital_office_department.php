<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hospital_office_department extends Model
{

    protected $table = 'hospital_offices_department';


    protected $primaryKey = 'id';


    protected $fillable = ['name'];
}
