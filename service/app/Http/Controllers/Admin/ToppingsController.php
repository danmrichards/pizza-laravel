<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Topping;

class ToppingsController extends Controller
{
	public function add(){
		return view('admin.products.toppings.add');
	}
	
	public function create(){
		$this->validate(request(),[
			'topping_name' => 'required',
			'topping_price' => 'required|numeric'
		]);
		
		Topping::create(request([
			'topping_name',
			'topping_price'
		]));
		
		session()->flash('message', 'Topping added');
		return redirect('/admin/products/toppings');
	}
	
	public function edit(Topping $topping){
		return view('.admin.products.toppings.edit')->with(compact('topping'));
	}
	
	public function update(Topping $topping){
		$this->validate(request(),[
			'topping_name' => 'required',
			'topping_price' => 'required|numeric'
		]);
		
		$name = request('topping_name');
		$price = request('topping_price');
		$active = (request('active') == 'on')?true:false;
		if($topping->topping_name != $name){
			$topping->topping_name = $name;
		}
		if($topping->topping_price != $price){
			$topping->topping_price = $price;
		}
		if($topping->active != $active){
			$topping->active = $active;
		}
		$topping->save();
		session()->flash('message', 'Topping updated.');
		return redirect('/admin/products/toppings');
	}
	
	public function remove(Topping $topping){
		$topping->delete();
		session()->flash('message', 'Topping deleted.');
		return back();
	}
}
