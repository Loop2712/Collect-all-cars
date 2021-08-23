<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','username','phone','brith','sex','act','ranking','provider_id','last_edit', 'driver_license' , 'driver_license2','organization' , 'branch' , 'branch_district' , 'branch_province', 'avatar' , 'photo','status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function register_cars(){
        return $this->hasMany('App\Models\Register_car', 'user_id');
    }

    public function guests(){
        return $this->hasMany('App\Models\Guest', 'user_id' ,'id');
    }

    public function products(){
        return $this->hasMany('App\Models\Wishlist', 'user_id','id'); 
    }  

    // public function sell(){
    //     return $this->hasMany('App\Sell', 'user_id'); 
    // }   

}
