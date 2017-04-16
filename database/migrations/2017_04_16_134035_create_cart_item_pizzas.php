<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartItemPizzas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_item_pizza', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('cart_item_id')->unsigned();
			$table->integer('pizza_id')->unsigned();
        });
        
        DB::table('cart_item_pizza')->insert([
        	'cart_item_id' => 1,
			'pizza_id' => 1
		]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart_item_pizzas');
    }
}
