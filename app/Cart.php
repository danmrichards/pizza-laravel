<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Cart extends Model
{
	protected $fillable = [
		'user_id', 'total'
	];
	
	public static function getUserCart(){
		$id = Auth::id();
		return static::where('id', $id)->orderBy('created_at', 'desc')->first();
	}
	
	/*
	 * Get cart items
	 */
	public function cartItems(){
		return $this->hasMany(CartItem::class, 'cart_id');
	}
	
}
