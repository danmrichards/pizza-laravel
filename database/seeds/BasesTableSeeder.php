<?php

use Illuminate\Database\Seeder;

class BasesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $base = new \App\Base();
        $base->base_name = 'Small';
        $base->base_price = 0.00;
        $base->save();
	
		$base = new \App\Base();
        $base->base_name = 'Medium';
        $base->base_price = 2.50;
        $base->save();
	
		$base = new \App\Base();
        $base->base_name = 'Large';
        $base->base_price = 5.00;
        $base->save();
	
		$base = new \App\Base();
        $base->base_name = 'X-Large';
        $base->base_price = 7.50;
        $base->save();
    }
}
