<?php

namespace App\Http\Controllers\Admin;

use App\Pizza;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Message;
use App\Offer;
use File;
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
}
