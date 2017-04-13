<?php

namespace App\Http\Controllers\Admin;

use App\Pizza;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;
class PizzasController extends Controller
{
	public function getPizzaImages($id){
		return File::allFiles(public_path('images/pizzas/').$id);
	}
	
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
			'pizza_desc',
			'pizza_price'
		]));

		if(request('images') != null){
			foreach(request('images') as $image){
				$filename = $image->getFilename().'.'.$image->getClientOriginalExtension();
				$image->move(public_path('images/pizzas/').$pizza->id, $filename);
			}
		}
		session()->flash('message', 'Pizza added successfully.');
		return redirect('/admin/products/pizzas');
	}
	
    public function edit(Pizza $pizza){
		$images = File::allFiles(public_path('images/pizzas/').$pizza->id);
		return view('admin.products.pizzas.edit')->with(compact('pizza', 'images'));
	}
	
	public function removeImages(){
		if(request('existingImages') != null){
			$pizza_id = request('id');
			$imagesToRemove = request('existingImages');
			$images = $this->getPizzaImages($pizza_id);
			foreach($images as $image){
				foreach($imagesToRemove as $itr){
					if($image->getFilename() == $itr){
						File::delete($image->getPathname());
					}
				}
			}
			session()->flash('message', 'Image removed successfully.');
			return back();
		}
		session()->flash('message', 'Select pictures to be removed.');
		return back();
		
	}
	
	public function addImages(){
		if(request('images') != null){
			$id = request('id');
			foreach(request('images') as $image){
				$filename = $image->getFilename().'.'.$image->getClientOriginalExtension();
				$image->move(public_path('images/pizzas/').$id, $filename);
			}
			session()->flash('message', 'Pictures added.');
			return back();
		}
		session()->flash('message', 'Select/add pictures prior to uploading them ;)');
		return back();
	}
	
	public function update(Pizza $pizza){
		dd($pizza);
		$this->validate(request(), [
			'pizza_name' => 'required',
			'pizza_price' => 'required|numeric',
			'pizza_short_desc' => 'required',
			'pizza_desc' => 'required'
		]);
		$pizza->pizza_name = request('pizza_name');
		$pizza->pizza_short_desc = request('pizza_short_desc');
		$pizza->pizza_desc = request('pizza_desc');
		$pizza->pizza_price = request('pizza_price');
		$pizza = Pizza::create(request([
			'pizza_name',
			'pizza_short_desc',
			'pizza_desc',
			'pizza_price'
		]));
		
		if(request('images') != null){
			foreach(request('images') as $image){
				$filename = $image->getFilename().'.'.$image->getClientOriginalExtension();
				$image->move(public_path('images/pizzas/').$pizza->id, $filename);
			}
		}
		session()->flash('message', 'Pizza added successfully.');
		return redirect('/admin/products/pizzas');
	}
	
	
}
