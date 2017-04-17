<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Base extends Model
{
	public $timestamps = false;
	public function scopeActive($query){
		return $query->where('active', 1);
	}
	
	protected $fillable = [
		'base_name', 'base_price'
	];
	
	public function cartItems(){
		return $this->belongsToMany(CartItem::class, 'cart_item_bases', 'base_id', 'cart_item_id');
	}
}
