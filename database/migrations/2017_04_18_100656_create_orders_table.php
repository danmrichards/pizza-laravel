<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('cart_id')->unsigned();
            $table->integer('address_id')->unsigned();
            $table->boolean('paid')->default(false);
            $table->boolean('delivered')->default(false);
			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
        
        Schema::table('orders', function(Blueprint $table){
        	$table->foreign('user_id')
				->references('id')
				->on('users');
		});
        
        Schema::table('orders', function(Blueprint $table){
        	$table->foreign('cart_id')
				->references('id')
				->on('carts');
		});
	
		Schema::table('orders', function(Blueprint $table){
			$table->foreign('address_id')
				->references('id')
				->on('addresses');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
