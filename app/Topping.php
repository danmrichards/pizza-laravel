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
}
