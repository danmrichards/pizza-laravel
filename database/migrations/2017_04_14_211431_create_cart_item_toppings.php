<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartItemToppings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_item_toppings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cart_item_id')->unsigned();
            $table->integer('topping_id')->unsigned();
        });
	
		Schema::table('cart_item_toppings', function(Blueprint $table){
			$table->foreign('cart_item_id')
				->references('id')
				->on('cart_items');
		});
	
		Schema::table('cart_item_toppings', function(Blueprint $table){
			$table->foreign('topping_id')
				->references('id')
				->on('toppings');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart_item_toppings');
    }
}
