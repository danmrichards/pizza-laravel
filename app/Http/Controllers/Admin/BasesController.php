<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Base;
class BasesController extends Controller
{
	public function add(){
		return view('admin.products.bases.add');
	}
	
	public function create(){
		$this->validate(request(), [
			'base_name' => 'required',
			'base_price' => 'required|numeric'
		]);
		
		Base::create(request([
			'base_name',
			'base_price'
		]));
		
		session()->flash('message', 'Base added successfully.');
		return redirect('/admin/products/bases');
	}
	
	public function edit(Base $base){
		return view('admin.products.bases.edit')->with(compact('base'));
	}
	
	public function update(Base $base){
		$this->validate(request(), [
			'base_name' => 'required',
			'base_price' => 'required|numeric'
		]);
		
		$name = request('base_name');
		$price = request('base_price');
		$active = (request('active') == 'on')? true:false;
		if($base->base_name != $name){
			$base->base_name = $name;
		}
		
		if($base->base_price != $price){
			$base->base_price = $price;
		}
		
		if($base->active != $active){
			$base->active = $active;
		}
		
		$base->save();
		session()->flash('message', 'Base updated.');
		return redirect('/admin/products/bases');
	}
	
	public function remove(Base $base){
		$base->delete();
		session()->flash('message', 'Base deleted.');
		return back();
	}
}
