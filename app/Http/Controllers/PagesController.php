<?php

namespace App\Http\Controllers;

use App\About;
use App\Http\Controllers\Admin\GalleryController;
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
		if($pizza != null){
			return view('order')->with(compact('pizza'));
		}
 		return view('order');
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
