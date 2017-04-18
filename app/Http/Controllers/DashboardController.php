<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
	public function index(){
		if(!auth()->check()){
			return redirect('/login');
		}
    	if(auth()->user()->isAdmin){
			return redirect('/admin');
		}
		return view('dashboard');
	}
}
