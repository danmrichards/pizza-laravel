<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$user = new \App\User();
    	$user->name = 'admin';
    	$user->email = 'admin@solent.com';
		$user->password = bcrypt('pass');
		$user->isAdmin = true;
		$user->save();
		
		$user = new \App\User();
    	$user->name = 'user';
    	$user->email = 'user@solent.com';
		$user->password = bcrypt('pass');
		$user->save();
    }
}
