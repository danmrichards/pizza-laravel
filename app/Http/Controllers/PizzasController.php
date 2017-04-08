<?php

namespace App\Http\Controllers;

use App\Pizza;

class PizzasController extends Controller
{
	protected $activePizzas;
	protected $pizzas;
	
	public function __construct()
	{
		$this->pizzas = Pizza::all();
		$this->activePizzas = Pizza::active()->get();
	}
	
	public function show(Pizza $pizza){
		return view('pizzas.show')->with([
			'activePizzas' => $this->activePizzas,
			'pizza' => $pizza
			]
		);
	}
	
	
}
