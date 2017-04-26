<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use DB;
class CustomersController extends Controller
{
    public function add(){
    	return view('admin.customers.add');
	}
	
	public function create(){
		$this->validate(request(), [
			'name' => 'required|min:3',
			'email' => 'required|email',
			'password' => 'required|min:6|confirmed'
		]);
		// create user
		User::create(request([
			'name',
			'email',
			bcrypt('password')]
		));
		
		//redirect
		return redirect('/admin/customers');
	}
	
	public function edit(User $user){
		return view('admin.customers.edit')->with(compact('user'));
	}
	
	public function update(){
		$user = User::find(request('id'));
		if($user->name != request('name')){
			$user->name = request('name');
		}
		if($user->password != bcrypt(request('password'))){
			$user->password = bcrypt(request('password'));
		}
		if($user->email != request('email')){
			$user->email = request('email');
		}
		
		if($user->isAdmin && !isset(request()->isAdmin)){
			$user->isAdmin = false;
		}elseif(!$user->isAdmin && isset(request()->isAdmin)){
			$user->isAdmin = true;
		}
		$user->save();
		
		return redirect('/admin/customers');
	}
	
	public function delete(User $user){
		$user->delete();
		
		return redirect('/admin/customers');
	}
}
