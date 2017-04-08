<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->middleware('guest', ['except' => 'destroy']);
	}
	
	public function index(){
    	return view('sessions.index');
	}
	
	public function create(){
 		if(!auth()->attempt(request(['email', 'password']))){
 			return back()->withErrors([
 				'message' => "Please check your credentials and try again."
			]);
		}
		return redirect('/');
 	
	}
	
	public function destroy(){
    	auth()->logout();
    	return redirect('/');
	}
}
