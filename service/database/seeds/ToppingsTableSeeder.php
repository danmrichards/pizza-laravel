<?php

use Illuminate\Database\Seeder;

class ToppingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $topping = new \App\Topping();
		$topping->topping_name = 'Cheese';
		$topping->topping_price = 0.20;
		$topping->save();
		
		$topping = new \App\Topping();
		$topping->topping_name = 'Mushrooms';
		$topping->topping_price = 0.40;
		$topping->save();
		
		$topping = new \App\Topping();
		$topping->topping_name = 'Ham';
		$topping->topping_price = 0.50;
		$topping->save();
		
		$topping = new \App\Topping();
		$topping->topping_name = 'Anchovies';
		$topping->topping_price = 0.60;
		$topping->save();
	}
}
