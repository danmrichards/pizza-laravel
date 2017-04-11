<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePizzasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pizzas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pizza_name')->unique();
            $table->text('pizza_short_desc');
            $table->text('pizza_desc');
            $table->double('pizza_price', 5,2);
            $table->boolean('active')->default(true);
        });
        
        DB::table('pizzas')->insert(
        	array(
        		'pizza_name' => 'Margherita',
				'pizza_short_desc' => '<p>Our original Cheese & Tomato pizza with plenty of cheese</p>',
				'pizza_desc' => '<p>Pizza Margherita is to many the true Italian flag.</p>
                            <p>According to popular tradition, in 1889, 28 years after the unification of Italy, during a visit to Naples of Queen Margherita of Savoy, wife of King Umberto I, chef Raffaele Esposito of Pizzeria Brandi and his wife created  a pizza resembling the colors of the Italian flag, red (tomato), white (mozzarella) and green (basil). They named it after the Queen - Pizza Margherita.</p>
                            <p>Descriptions of such a pizza recipe, however, can be traced back to at least 1866 in  Francesco DeBouchard book “Customs and Traditions of Naples” -  (Vol II, p.. 124). There he describes the most popular pizza toppings of the time which included one with cheese and basil, often topped with slices of mozzarella.</p>
                            <p>Whatever the real origins of this pizza recipe are, all we know for sure is that Raffaele Esposito\'s version for Queen Margherita was the one that made it popular. Since then it has grown into one of the most recognisable symbol of Italian food culture in the world.</p>
                            <p>Since 2009, Pizza Margherita is one of the three Pizze Napoletane with an STG (Specialità Tradizionali Garantite - Traditional Guaranteed Specialty) EU label together with the Marinara (garlic and oregano) and the Margherita Extra (mozzarella di Bufala Campana DOP, fresh basil and tomatoes).</p>
                            <p>The top quality of the ingredients and the traditional preparation and cooking method are at the basis of a true Pizza Napoletana STG.</p>',
				'pizza_price' => 5.00,
				'active' => true
			)
		);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pizzas');
    }
}
