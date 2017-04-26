<?php

use Illuminate\Database\Seeder;

class AboutTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $about = new \App\About();
        $about->about = 'Edit me and save';
        $about->save();
    }
}
