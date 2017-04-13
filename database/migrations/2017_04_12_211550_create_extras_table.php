<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExtrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extras', function (Blueprint $table) {
            $table->increments('id');
            $table->string('extras_name');
            $table->double('extras_price', 5, 2);
            $table->boolean('active')->default(true);
        });
        
        DB::table('extras')->insert(array(
        	'extras_name' => 'Chips',
			'extras_price' => 1.50
		));
		DB::table('extras')->insert(array(
			'extras_name' => 'Garlic Bread',
			'extras_price' => 2.00
		));
		DB::table('extras')->insert(array(
			'extras_name' => 'Coca Cola',
			'extras_price' => 1.99
		));
		DB::table('extras')->insert(array(
			'extras_name' => 'Garlic Sauce',
			'extras_price' => 0.40
		));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('extras');
    }
}
