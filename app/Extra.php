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
}
