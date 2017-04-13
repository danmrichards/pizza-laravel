<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateToppingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('toppings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('topping_name');
            $table->double('topping_price', 5, 2);
            $table->boolean('active')->default(true);
        });
        
        DB::table('toppings')->insert(array(
        	'topping_name' => 'Cheese',
        	'topping_price' => 0.20,
		));
        
        DB::table('toppings')->insert(array(
        	'topping_name' => 'Mushrooms',
        	'topping_price' => 0.40,
		));
        
        DB::table('toppings')->insert(array(
        	'topping_name' => 'Ham',
        	'topping_price' => 0.50,
		));
        
        DB::table('toppings')->insert(array(
        	'topping_name' => 'Anchovies',
        	'topping_price' => 0.60,
		));
    
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('toppings');
    }
}
