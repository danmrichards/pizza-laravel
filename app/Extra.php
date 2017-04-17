<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Extra extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
    	'extras_name', 'extras_price'
	];
 
 	public function scopeActive($query){
 		return $query->where('active', 1);
	}
	
	public function cartItems(){
		return $this->belongsToMany(CartItem::class, 'cart_item_extras', 'extras_id', 'cart_item_id');
	}
}
