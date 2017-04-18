<?php

use Illuminate\Database\Seeder;

class CartItemBasesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cartItemBase = new \App\CartItemBase();
        $cartItemBase->cart_item_id = 1;
        $cartItemBase->base_id = 2;
        $cartItemBase->save();
        
        $cartItemBase = new \App\CartItemBase();
        $cartItemBase->cart_item_id = 2;
        $cartItemBase->base_id = 1;
        $cartItemBase->save();
	
		$cartItemBase = new \App\CartItemBase();
		$cartItemBase->cart_item_id = 3;
		$cartItemBase->base_id = 2;
		$cartItemBase->save();
	
		$cartItemBase = new \App\CartItemBase();
		$cartItemBase->cart_item_id = 4;
		$cartItemBase->base_id = 1;
		$cartItemBase->save();
    
        
        
    }
}
