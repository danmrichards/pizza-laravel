<?php

namespace App\Http\Controllers;

use App\Cart;
use App\CartItem;
use App\CartItemBase;
use App\CartItemPizza;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function create(Request $request){
    	if($request->ajax()){
			//get currently logged in user id
			$user_id = Auth::id();
			// get ajax data
			$pizza_id = $request->pizza;
			$base_id = $request->base;
			// pizza and base are the minimum required
			// if not set return null back to JS
			if($pizza_id == null || $base_id == null){
				return json_encode(null);
			}
			$toppings_ids = $request->toppings;
			$extras_ids = $request->extras;
			$subtotal = $request->total;
			// check if cart for this user already exists
			if(Cart::getUserCart() != null){
				$cart = Cart::getUserCart();
				// if last users cart is completed
				if($cart->completed){
					// create new cart
					$cart = Cart::create([
						'user_id' => $user_id
					]);
				}
			}else {
				$cart = Cart::create([
					'user_id' => $user_id
				]);
			}
			
			// based on recieved data create cart item
			$cart_item = CartItem::create([
				'cart_id' => $cart->id,
				'subtotal' => $subtotal
			]);
			
			$cart_item_pizza = new CartItemPizza();
			$cart_item_pizza->cart_item_id = $cart_item->id;
			$cart_item_pizza->pizza_id = $pizza_id;
			$cart_item_pizza->save();
			
			$cart_item_base = new CartItemBase();
			$cart_item_base->cart_item_id = $cart_item->id;
			$cart_item_base->base_id = $base_id;
			$cart_item_base->save();
			
			// return cart item back to ajax
			if(count($toppings_ids) > 0){
				foreach($toppings_ids as $topid){
					DB::table('cart_item_toppings')->insert([
						'cart_item_id' => $cart_item->id,
						'topping_id' => $topid
					]);
				}
			}
			
			if(count($extras_ids) > 0){
				foreach($extras_ids as $extraid){
					DB::table('cart_item_extras')->insert([
						'cart_item_id' => $cart_item->id,
						'extras_id' => $extraid
					]);
				}
			}
			
			$cart->total = $this->calculateCartTotal($cart);
			$cart->save();
			
			// in ajax inesrt data to cart
			$js_cart_item = $this->prepareResponse($cart_item);
			$js_cart_item['cart_id'] = $cart->id;
			return json_encode($js_cart_item);
		}
	}
	
	public function destroy(CartItem $cartItem){
		$cart = $cartItem->cart;
    	// remove extras
		foreach($cartItem->extras as $extras){
			DB::table('cart_item_extras')->where('cart_item_id', $cartItem->id)->delete();
		}

    	// remove toppings
    	foreach($cartItem->toppings as $topping){
			DB::table('cart_item_toppings')->where('cart_item_id', $cartItem->id)->delete();
		}
		// remove bases
		DB::table('cart_item_bases')->where('cart_item_id', $cartItem->id)->delete();
    	// remove pizzas
		DB::table('cart_item_pizzas')->where('cart_item_id', $cartItem->id)->delete();
    	// remove cart item
		$cartItem->delete();
    	// remove cart if last cart item has been removed too
    	if(count($cart->cartItems) == 0){
    		$cart->delete();
		}else{
			$cart->total = $this->calculateCartTotal($cart);
			$cart->save();
		}
    	return response()->json('done');
	}
	
	public function checkout(Cart $cart){
		$address = $cart->user->addresses()->orderBy('id', 'desc')->first();
//		dd($address);
		return view('checkout')->with(compact('cart', 'address'));
	}
	
	private function calculateCartTotal($cart){
 		$total = 0;
 		foreach($cart->cartItems as $cartItem){
 			$total += $cartItem->subtotal;
		}
		return $total;
	}
	
	private function prepareResponse($cartItem){
		$js_cart_item = [];
		$js_cart_item['id'] = 3;
		$js_cart_item['pizza_name'] = $cartItem->pizzas()->first()->pizza_name;
		$js_cart_item['pizza_price'] = $cartItem->pizzas()->first()->pizza_price;
		$js_cart_item['pizza_base'] = $cartItem->bases()->first()->base_name;
		$js_cart_item['base_price'] = $cartItem->bases()->first()->base_price;
		$js_cart_item['subtotal'] = $cartItem->subtotal;
		$js_cart_item['toppings'] = [];
		$js_cart_item['toppings_prices'] = [];
		foreach($cartItem->toppings as $topping){
			array_push($js_cart_item['toppings'], $topping->topping_name);
			array_push($js_cart_item['toppings_prices'], $topping->topping_price);
		}
		$js_cart_item['extras'] = [];
		$js_cart_item['extras_prices'] = [];
		foreach($cartItem->extras as $extras){
			array_push($js_cart_item['extras'], $extras->extras_name);
			array_push($js_cart_item['extras_prices'], $extras->extras_price);
		}
		
		return $js_cart_item;
	}
}
