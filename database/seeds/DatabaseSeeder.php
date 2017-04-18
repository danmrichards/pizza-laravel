<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AboutTableSeeder::class);
        $this->call(PizzasTableSeeder::class);
        $this->call(BasesTableSeeder::class);
        $this->call(ExtrasTableSeeder::class);
        $this->call(ToppingsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CartsTableSeeder::class);
        $this->call(CartItemsTableSeeder::class);
        $this->call(CartItemPizzasTableSeeder::class);
        $this->call(CartItemBasesTableSeeder::class);
        $this->call(CartItemToppingsTableSeeder::class);
        $this->call(CartItemExtrasTableSeeder::class);
        $this->call(AddressesTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
    }
}
