<?php

use Illuminate\Database\Seeder;

class CartItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cartItem = new \App\CartItem();
        $cartItem->cart_id = 1;
        $cartItem->subtotal = 14.09;
		$cartItem->save();
		
		$cartItem = new \App\CartItem();
        $cartItem->cart_id = 1;
        $cartItem->subtotal = 6.00;
		$cartItem->save();
    }
}
