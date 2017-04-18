<?php

use Illuminate\Database\Seeder;

class AddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $address = new \App\Address();
        $address->number = '21';
        $address->street_name = 'Stree Name';
        $address->post_code = 'PO21 6TH';
        $address->city = 'City Name';
        $address->user_id = '1';
        $address->save();
    }
}
