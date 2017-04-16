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
		DB::table('pizzas')->insert(
			array(
				'pizza_name' => 'Hawaii',
				'pizza_short_desc' => '<p>Ham, pineapple, mushrooms.</p>',
				'pizza_desc' => '<p>Hawaiian pizza is a pizza that usually consists of a cheese and tomato base with pieces of ham and pineapple. Often versions will have mixed peppers, mushrooms and bacon. Another variety consists of pineapple and Canadian bacon[1] or American Bacon. It is the most popular pizza in Australia, accounting for 15% of pizza sales.</p>
                            <p>Despite its name, Hawaiian pizza is not a Hawaiian invention; it is Canadian. The Village Voice, National Post, Toronto Sun, London Free Press and The Chatham Daily News have covered Albert Hawaiian-pizza\'s claim that he created the first Hawaiian pizza at the Satellite Restaurant in Chatham, Ontario, Canada in 1962. A co-owner of the Satellite Restaurant at that time - along with his brother, Nick Panopoulos - Sam and his brother were business partners for approximately 50 years. The brothers would later build on the popularity of the Hawaiian Pizza and begin serving their next creation - the Hawaiian Burger.</p>',
				'pizza_price' => 6.00,
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
