<?php

namespace App\Http\Controllers;

use App\About;
use App\Base;
use App\Cart;
use App\Extra;
use App\Http\Controllers\Admin\GalleryController;
use App\Order;
use App\Topping;
use File;
use App\Pizza;
use App\Offer;
class PagesController extends Controller
{
	public function index(){
		$slides = File::allFiles(public_path('images/slider/slides'));
    	return view('index')->with(compact('slides'));
	}
	
	public function order(Pizza $pizza){
		$pizzas = Pizza::active()->get();
		$bases = Base::active()->get();
		$toppings = Topping::active()->get();
		$extras = Extra::active()->get();
		$cart = Cart::getUserCart();
		$images = array();
		foreach($pizzas as $p){
			$file = File::allFiles(public_path('images/pizzas/'.$p->id));
			$images[$p->id] = $file[0];
		}
		if(!empty($pizza['attributes'])){
			return view('order')->with(compact('pizza', 'pizzas', 'images', 'bases', 'toppings', 'extras', 'cart'));
		}
		return view('order')->with(compact('pizzas', 'images', 'bases', 'toppings', 'extras', 'cart'));
	}
	
	public function orders(){
		$orders = auth()->user()->orders;
		return view('order.orders')->with(compact('orders'));
	}
	
	public function view(Order $order){
		return view('order.view')->with(compact('order'));
	}
	
	public function offers(){
		$offers = Offer::all();
 		return view('offers')->with(compact('offers'));
	}
	
	public function gallery(){
		$images = GalleryController::get();
 		return view('gallery')->with([
			'images' => $images
		]);
	}
	
	public function contact(){
 		return view('contact');
	}
	
	public function about(){
		$about = About::first();
 		return view('about')->with(compact('about'));
	}
	
	
}
