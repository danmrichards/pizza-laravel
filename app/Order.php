<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
    	'user_id', 'cart_id', 'total'
	];
    
    public function user(){
    	return $this->belongsTo(User::class, 'user_id', 'id');
	}
	
	public function cart(){
    	return $this->belongsTo(Cart::class, 'cart_id', 'id');
	}
	
//	public function
}
