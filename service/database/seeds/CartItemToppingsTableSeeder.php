<?php

use Illuminate\Database\Seeder;

class CartItemToppingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$cartItemTopping = new \App\CartItemTopping();
		$cartItemTopping->cart_item_id = 1;
		$cartItemTopping->topping_id = 1;
		$cartItemTopping->save();
	
		$cartItemTopping = new \App\CartItemTopping();
		$cartItemTopping->cart_item_id = 1;
		$cartItemTopping->topping_id = 2;
		$cartItemTopping->save();
	
		$cartItemTopping = new \App\CartItemTopping();
		$cartItemTopping->cart_item_id = 1;
		$cartItemTopping->topping_id = 3;
		$cartItemTopping->save();
	
		$cartItemTopping = new \App\CartItemTopping();
		$cartItemTopping->cart_item_id = 3;
		$cartItemTopping->topping_id = 1;
		$cartItemTopping->save();
	
		$cartItemTopping = new \App\CartItemTopping();
		$cartItemTopping->cart_item_id = 3;
		$cartItemTopping->topping_id = 2;
		$cartItemTopping->save();
	
		$cartItemTopping = new \App\CartItemTopping();
		$cartItemTopping->cart_item_id = 3;
		$cartItemTopping->topping_id = 3;
		$cartItemTopping->save();
	
	}
}
