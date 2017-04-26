<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topping extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
    	'topping_name', 'topping_price'
	];
    
    public function scopeActive($query){
    	return $query->where('active', 1);
	}
	
	public function cartItems(){
		return $this->belongsToMany(CartItem::class, 'cart_item_toppings', 'topping_id', 'cart_item_id');
	}
}
