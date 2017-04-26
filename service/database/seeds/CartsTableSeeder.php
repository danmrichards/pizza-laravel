<?php

use Illuminate\Database\Seeder;

class CartsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cart = new \App\Cart();
		$cart->user_id = 1;
		$cart->completed = true;
		$cart->total = 20.09;
		$cart->save();
	
		$cart = new \App\Cart();
		$cart->user_id = 1;
		$cart->total = 13.09;
		$cart->save();
    }
}
