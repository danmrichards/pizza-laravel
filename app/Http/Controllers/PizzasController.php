<?php

namespace App\Http\Controllers;

use App\Pizza;

class PizzasController extends Controller
{
	public function show(Pizza $pizza)
	{
		return view('pizzas.show')->with([
				'pizza' => $pizza
			]
		);
	}
}
