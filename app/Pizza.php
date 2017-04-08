<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    public function scopeActive($query){
    	return $query->where('active', 1);
	}
}
