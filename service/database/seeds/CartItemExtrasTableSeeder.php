<?php

use Illuminate\Database\Seeder;

class CartItemExtrasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$cartItemExtras = new \App\CartItemExtras();
		$cartItemExtras->cart_item_id = 1;
		$cartItemExtras->extras_id = 1;
		$cartItemExtras->save();
	
		$cartItemExtras = new \App\CartItemExtras();
		$cartItemExtras->cart_item_id = 1;
		$cartItemExtras->extras_id = 2;
		$cartItemExtras->save();
	
		$cartItemExtras = new \App\CartItemExtras();
		$cartItemExtras->cart_item_id = 1;
		$cartItemExtras->extras_id = 3;
		$cartItemExtras->save();
	
		$cartItemExtras = new \App\CartItemExtras();
		$cartItemExtras->cart_item_id = 3;
		$cartItemExtras->extras_id = 1;
		$cartItemExtras->save();
	
		$cartItemExtras = new \App\CartItemExtras();
		$cartItemExtras->cart_item_id = 3;
		$cartItemExtras->extras_id = 2;
		$cartItemExtras->save();
	
		$cartItemExtras = new \App\CartItemExtras();
		$cartItemExtras->cart_item_id = 3;
		$cartItemExtras->extras_id = 3;
		$cartItemExtras->save();
    }
}
