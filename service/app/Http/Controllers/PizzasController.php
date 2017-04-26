<?php

namespace App\Http\Controllers;

use App\Pizza;
use File;
class PizzasController extends Controller
{
	public function show(Pizza $pizza){
		$images = File::allFiles(public_path('images/pizzas').'/'.$pizza->id);
		return view('pizzas.show')->with([
			'pizza' => $pizza,
			'images' => $images
		]);
	}
}
