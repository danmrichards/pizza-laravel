<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
	
	protected $fillable = [
		'cart_id', 'pizza_id', 'base_id', 'subtotal'
	];
	
	public function cart(){
		return $this->belongsTo(Cart::class);
	}
	
    public function pizzas(){
    	return $this->hasMany(Pizza::class);
	}
	
//	public function bases(){
//    	return $this->hasMany(Base::class);
//	}
//
//	public function toppings(){
//		return $this->belongsToMany(Topping::class);
//	}
//
//	public function extras(){
//		return $this->belongsToMany(Extra::class);
//	}
	
}
