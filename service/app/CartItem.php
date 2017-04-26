<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
	
	protected $fillable = [
		'cart_id', 'pizza_id', 'base_id', 'subtotal'
	];
	
	public function cart(){
		return $this->belongsTo(Cart::class, 'cart_id', 'id');
	}
	
	public function pizzas(){
		return $this->belongsToMany(Pizza::class, 'cart_item_pizzas', 'cart_item_id', 'pizza_id');
	}
	
	public function bases(){
		return $this->belongsToMany(Base::class, 'cart_item_bases', 'cart_item_id', 'base_id');
	}
	
	public function toppings(){
		return $this->belongsToMany(Topping::class, 'cart_item_toppings', 'cart_item_id', 'topping_id');
	}
	
	public function extras(){
		return $this->belongsToMany(Extra::class, 'cart_item_extras', 'cart_item_id', 'extras_id');
	}
	
}
