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
}
