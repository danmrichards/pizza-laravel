<?php

namespace App\Http\Controllers;

use File;

class PagesController extends PizzasController
{
	public function index(){
    	return view('index')->with(['activePizzas' => $this->activePizzas]);
	}
	
	public function order(){
 		return view('order')->with(['activePizzas' => $this->activePizzas]);
	}
	
	public function offers(){
 		return view('offers')->with(['activePizzas' => $this->activePizzas]);
	}
	
	public function gallery(){
		$images = File::allFiles('images/gallery/restaurant');
 		return view('gallery')->with([
 			'activePizzas' => $this->activePizzas,
			'images' => $images
		]);
	}
	
	public function contact(){
 		return view('contact')->with(['activePizzas' => $this->activePizzas]);
	}
	
	public function about(){
 		return view('about')->with(['activePizzas' => $this->activePizzas]);
	}
	
	
}
