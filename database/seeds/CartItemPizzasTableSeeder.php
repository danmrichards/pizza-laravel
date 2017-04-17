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
    	$cartItemPizzas = new \App\CartItemPizza();
    	$cartItemPizzas->cart_item_id = 1;
    	$cartItemPizzas->pizza_id = 1;
    	$cartItemPizzas->save();
    }
}
