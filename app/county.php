<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class county extends Model
{
    protected $table = "districts";
//ชื่อคอลัมน์ในฐานข้อมูลที่อนุญาติให้แก้ไขข้อมูล
    protected $fillable = ["province"];    
//Primary Key
 	protected $primaryKey = "id";
}
