<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;


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
		return view('admin.messages.messages');
	}
}
