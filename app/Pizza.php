<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    public function scopeActive($query){
    	return $query->where('active', 1);
	}
	
	protected $fillable = [
		'pizza_name', 'pizza_short_desc', 'pizza_desc', 'pizza_price', 'active'
	];
	public $timestamps = false;
}
