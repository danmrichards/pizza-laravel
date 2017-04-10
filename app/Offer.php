<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
	protected $fillable = [
		'offer_name', 'offer_desc', 'image_name'
	];
	
}
