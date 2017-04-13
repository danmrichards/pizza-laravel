<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bases', function (Blueprint $table) {
            $table->increments('id');
            $table->string('base_name');
            $table->double('base_price', 5, 2);
            $table->boolean('active')->default(true);
        });
        
        DB::table('bases')->insert(array(
        	'base_name' => 'Small',
        	'base_price' => 0.00,
		));
	
		DB::table('bases')->insert(array(
			'base_name' => 'Medium',
			'base_price' => 2.50,
		));
	
		DB::table('bases')->insert(array(
			'base_name' => 'Large',
			'base_price' => 5.00,
		));
	
		DB::table('bases')->insert(array(
			'base_name' => 'X-Large',
			'base_price' => 7.50,
		));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bases');
    }
}
