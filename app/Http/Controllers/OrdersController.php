<?php

namespace App\Http\Controllers;

use App\Address;
use App\Cart;
use App\Order;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    public function create(Cart $cart){
    	$this->validate(request(), [
    		'street_name' => 'required',
			'post_code' => 'required',
			'city' => 'required'
		]);
		$address = $cart->user->addresses()->orderBy('id', 'desc')->first();
  
		if(request('number')!= $address->number ||
			request('street_name') != $address->street_name ||
			request('post_code') != $address->post_code ||
			request('city') != $address->city){
				$newAddress = new Address();
				$newAddress->number = request('number');
				$newAddress->street_name = request('street_name');
				$newAddress->post_code = request('post_code');
				$newAddress->city = request('city');
				$newAddress->save();
		}
  
		$order = new Order();
		$order->user_id = Auth::id();
		$order->cart_id = $cart->id;
    	if(isset($newAddress) && empty($newAddress->getAttributes())){
			$order->address_id = $newAddress->id;
		}else{
			$order->address_id = $address->id;
		}
		
		$order->save();
    	$cart->completed = 1;
    	$cart->save();
		
    	session()->flash('message', 'Order complete.');

    	return redirect('/dashboard');
	}
	
	public function view(Order $order){
    	return view('admin.orders.view')->with(compact('order'));
	}
}
