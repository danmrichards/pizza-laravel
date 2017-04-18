<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'isAdmin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function scopeUsers($query){
    	return $query->where('isAdmin', false);
	}
	
	public function carts(){
    	return $this->hasMany(Cart::class, 'user_id');
	}
	
	public function orders(){
    	return $this->hasMany(Order::class, 'user_id');
	}
	
	public function addresses(){
		return $this->hasMany(Address::class, 'user_id');
	}
}


