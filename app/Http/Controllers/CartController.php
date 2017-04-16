<?php

namespace App\Http\Controllers;

use App\Cart;
use App\CartItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class CartController extends Controller
{
    public function create(Request $request){
    	if($request->ajax()){
//    		return Response::json($request);
			//get currently logged in user id
			$user_id = Auth::id();
			
			// get ajax data
			$pizza_id = $request->pizza;
			$base_id = $request->base;
			$toppings_ids = $request->toppings;
			$extras_ids = $request->extras;
			$subtotal = $request->total;
			
			// check if cart for this user already exists
			$cart = Cart::getUserCart();
			return json_encode($cart);
			// check if cart exists
			if($cart != null){
				// if last users cart is completed
				if($cart->completed){
					// create new cart
					$cart = Cart::create([
						'user_id' => $user_id
					]);
				}
				
				// based on recieved data create cart item
				$cart_item = CartItem::create([
					'cart_id' => $cart->id,
					'pizza_id' => $pizza_id,
					'base_id' => $base_id,
					'subtotal' => $subtotal
				]);
				
				// return cart item back to ajax
				foreach($toppings_ids as $topid){
					DB::table('cart_item_toppings')->insert([
						'cart_item_id' => $cart_item->id,
						'topping_id' => $topid
					]);
				}
				
				foreach($extras_ids as $extraid){
					DB::table('cart_item_extras')->insert([
						'cart_item_id' => $cart_item->id,
						'extras_id' => $extraid]);
				}
				
				
				$cart->total = $this->calculateCartTotal($cart);
				$cart->save();
				
				// in ajax inesrt data to cart
				return Response::json($cart_item);
				
			}
			
			
		}
		
		
	}
	
	private function calculateCartTotal($cart){
 		$total = 0;
 		foreach($cart->cartItems as $cartItem){
 			$total += $cartItem->subtotal;
		}
		return $total;
	}
}
