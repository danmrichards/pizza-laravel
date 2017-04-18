<?php

namespace App\Http\Controllers\Admin;

use App\Extra;
use App\Order;
use App\Pizza;
use App\Http\Controllers\Controller;
use App\User;
use App\Message;
use App\Offer;
use File;
use App\About;
use App\Base;
use App\Topping;

class AdminPagesController extends Controller
{
    public function index(){
    	return view('admin.index');
	}
	
	public function customers(){
    	$users = User::users()->get();
    	return view('admin.customers.customers')->with(compact('users'));
	}
	
	public function gallery(){
		$images = GalleryController::get();
		return view('admin.gallery.gallery')->with(compact('images'));
	}
	
	public function messages(){
		$messages = Message::all();
		return view('admin.messages.messages')->with(compact('messages'));
	}
	
	public function offers(){
		$offers = Offer::all();
		return view('admin.offers.offers')->with(compact('offers'));
	}
	
	public function orders(){
		$orders = Order::all();
		return view('admin.orders.orders')->with(compact('orders'));
	}
	
	public function slider(){
		$slides = File::allFiles('images/slider/slides');
		return view('admin.slider.slider')->with(compact('slides'));
	}
	
	public function products(){
		return view('admin.products.index');
	}
	
	public function pizzas(){
		$pizzas = Pizza::all();
		return view('admin.products.pizzas.pizzas')->with(compact('pizzas'));
	}
	
	public function bases(){
		$bases = Base::active()->get();
		return view('admin.products.bases.bases')->with(compact('bases'));
	}
	
	public function toppings(){
		$toppings = Topping::active()->get();
		return view('admin.products.toppings.toppings')->with(compact('toppings'));
	}
	
	public function extras(){
		$extras = Extra::active()->get();
		return view('admin.products.extras.extras')->with(compact('extras'));
	}
	
	public function about(){
		$about = About::first();
		return view('admin.about.about')->with(compact('about'));
	}
	
	
}
