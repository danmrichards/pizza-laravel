<?php

use Illuminate\Database\Seeder;

class ExtrasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$extras = new \App\Extra();
    	$extras->extras_name = 'Chips';
    	$extras->extras_price = 1.50;
    	$extras->save();
    	
		$extras = new \App\Extra();
    	$extras->extras_name = 'Garlic Bread';
    	$extras->extras_price = 2.00;
    	$extras->save();
    	
		$extras = new \App\Extra();
    	$extras->extras_name = 'Coca Cola';
    	$extras->extras_price = 1.99;
    	$extras->save();
    	
		$extras = new \App\Extra();
    	$extras->extras_name = 'Garlic Sauce';
    	$extras->extras_price = 0.40;
    	$extras->save();
    }
}
