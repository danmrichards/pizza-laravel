<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class RegisterController extends Controller
{
	public function create(){
		return view('registration.create');
	}
	
	public function store(){
		// validate
		$this->validate(request(), [
			'username' => 'required|min:3',
			'email' => 'required|email',
			'password' => 'required|min:6|confirmed'
		]);
		// create user
		$user = User::create(request([
				'username',
				'email',
				bcrypt('password')]
		));
		
		// login
		auth()->login($user);
		
		//redirect
		return redirect('/');
	}
}
