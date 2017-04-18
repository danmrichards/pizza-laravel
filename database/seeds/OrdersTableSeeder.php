<?php

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $order = new \App\Order();
        $order->user_id = 1;
        $order->cart_id = 1;
        $order->address_id = 1;
        $order->save();
        
    }
}
