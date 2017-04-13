@extends('layouts.master')

@section('content')
    <section id="inset-white">
        <aside id="choices">
            <p class="orderError"></p>
            <form action="order/basket" method="post" id="addToOrder">
                <fieldset id="pizza">
                    <legend>Select a pizza*</legend>

                    <div class="pizza_container">
                        <div>

                            <img src="gallery/pizzas/.jpg" alt="Pizza ">
                        </div>
                        <div>
                            <label>
                                <input type="radio" name="pizza" value="">
                                <span class="name"></span>
                                <span class="price"></span>
                            </label>
                        </div>
                    </div>
                </fieldset>
                <fieldset id="base">
                    <legend>Select a base*</legend>

                    <label>
                        <input type="radio" name="base" value="">
                        <span class="name"></span>
                        <span class="price"></span>
                    </label><br>

                </fieldset>
                <fieldset id="topping">
                    <legend>Select one or more topping*</legend>

                    <label>
                        <input type="checkbox" name="toppings[]" value="">
                        <span class="name"></span>
                        <span class="price"></span>
                    </label><br>

                </fieldset>
                <fieldset id="extras">
                    <legend>Extras</legend>

                    <label>
                        <input type="checkbox" name="extras[]" value="">
                        <span class="name"></span>
                        <span class="price"></span>
                    </label><br>

                </fieldset>

                <input type="reset" value="Reset" name="clear_form" class="left">
                <input type="submit" value="Add to order" class="right" name="add_to_order">
                <div class="clear"></div>
            </form>
        </aside>

    </section>
    <div id="basket">
        <img src="public/images/gallery/basket.png" alt="basket" id="basket_btn">
        <div id="total_box">
            <h2>Order summary</h2>

            <div class="order_item">
                <div>
                    <div class="pizza">
                        <span class="left product_name"></span>
                        <span class="right product_price"></span>
                    </div>

                    <div class="topping">
                        <span class="left product_name"></span>
                        <span class="right product_price"></span>
                    </div>

                    <div class="extras">
                        <span class="left product_name"></span>
                        <span class="right product_price"></span>
                    </div>

                    <div class="subtotal"></div>
                    <div class="clear"></div>
                </div>
            </div>

            <div id="basket-footer">
                <form action="order/order" method="post">
                    <input type="submit" value="Order" class="left">
                </form>
                <span id="total" class="right"></span>
            </div>

            <div class="clear"></div>
        </div>
    </section>
@endsection