<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Extra;

class ExtrasController extends Controller
{
	public function add(){
		return view('admin.products.extras.add');
	}
	
	public function create(){
		$this->validate(request(), [
			'extras_name' => 'required',
			'extras_price' => 'required|numeric'
		]);
		
		Extra::create(request([
			'extras_name',
			'extras_price'
		]));
		
		session()->flash('message', 'Extras added successfully.');
		return redirect('/admin/products/extras');
	}
	
	public function edit(Extra $extra){
		return view('admin.products.extras.edit')->with(compact('extra'));
	}
	
	public function update(Extra $extra){
		$this->validate(request(), [
			'extras_name' => 'required',
			'extras_price' => 'required|numeric'
		]);
		
		$name = request('extras_name');
		$price = request('extras_price');
		$active = (request('active') == 'on')? true:false;
		if($extra->extras_name != $name){
			$extra->extra_name = $name;
		}
		
		if($extra->extras_price != $price){
			$extra->extras_price = $price;
		}
		
		if($extra->active != $active){
			$extra->active = $active;
		}
		
		$extra->save();
		session()->flash('message', 'Extra updated.');
		return redirect('/admin/products/extras');
	}
	
	public function remove(Extra $extra){
		$extra->delete();
		session()->flash('message', 'Extra deleted.');
		return back();
	}
}
