<?php

namespace App\Http\Controllers\Admin;

use App\Pizza;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PizzasController extends Controller
{
	public function add(){
		return view('admin.products.pizzas.add');
	}
	
	public function create(){
		$this->validate(request(), [
			'pizza_name' => 'required',
			'pizza_price' => 'required|numeric',
			'pizza_short_desc' => 'required',
			'pizza_desc' => 'required'
		]);
		
		$pizza = Pizza::create(request([
			'pizza_name',
			'pizza_short_desc',
			'short_desc',
			'pizza_desc',
			'pizza_price'
		]));

		if(request('images') != null){
			foreach(request('images') as $image){
				$filename = $image->getFilename().'.'.$image->getClientOriginalExtension();
				echo $filename;
				$image->move(public_path('images/pizzas/').$pizza->id, $filename);
			}
		}
		
		session()->flash('message', 'Pizza added successfully.');
		
		return redirect('/admin/products/pizzas');
	}
	
    public function edit(){
    
	}
}
