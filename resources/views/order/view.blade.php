@extends('layouts.master')

@section('content')
    <section id="inset-white">
        <div class="field">
            @foreach($order->cart->cartItems as $cartItem)
                <div class="summary-wrapper">
                    <div id="order-summary" class="left">

                        <span class="pizza-name">{{ $cartItem->pizzas[0]->pizza_name . ' ' . $cartItem->bases[0]->base_name }}</span>

                        @foreach($cartItem->toppings as $topping)
                            <span class="additions">{{ $topping->topping_name }}</span>
                        @endforeach

                        @foreach($cartItem->extras as $extras)
                            <span class="additions">{{ $extras->extras_name }}</span>
                        @endforeach
                    </div>
                    <div id="subtotal" class="right">
                        <span class="price">{{ number_format($cartItem->subtotal, 2) }}</span>
                    </div>
                    <div class="clear"></div>
                </div>
            @endforeach
            <div class="summary-wrapper">
                <div class="right">
                    <span class="left">Total</span>
                    <span class="right price">{{ number_format($order->cart->total, 2) }}</span>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </section>
@endsection