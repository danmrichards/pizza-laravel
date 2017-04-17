<?php

use Illuminate\Database\Seeder;

class CartItemPizzasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$cartItemPizza = new \App\CartItemPizza();
    	$cartItemPizza->cart_item_id = 1;
    	$cartItemPizza->pizza_id = 1;
    	$cartItemPizza->save();
    	
    	$cartItemPizza = new \App\CartItemPizza();
    	$cartItemPizza->cart_item_id = 2;
    	$cartItemPizza->pizza_id = 2;
    	$cartItemPizza->save();
    	
    	
    }
}
