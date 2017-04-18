@extends('layouts.master')

@section('content')
    <section id="inset-white">
        <div id="order-final">
            <fieldset class="center">
                <legend>Order Summary</legend>
                @foreach($cart->cartItems as $cartItem)
                <div class="summary-wrapper">
                    <div id="order-summary" class="left">
                        <span class="pizza-name">{{ $cartItem->pizzas[0]->pizza_name . ' ' . $cartItem->bases[0]->base_name}}</span>

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
                <p><span class="left">Total</span><span class="right price">{{ number_format($cart->total, 2) }}</span></p>
            </fieldset>

            @if(Auth::check())
                <fieldset class="center">
                    <form method="POST" action="/order/{{ $cart->id }}">
                        {{ csrf_field() }}
                        <button type="submit">Order</button>
                    </form>
                </fieldset>
            @else
                <fieldset class="center" id="loginRegister">
                    <div class="left">
                        <div class="loginButton">
                            <a href="">
                                <button type="button">Login</button>
                            </a>
                        </div>
                    </div>
                    <div class="right">
                        <div class="registerButton">
                            <a href="">
                                <button type="button">Register</button>
                            </a>
                        </div>
                    </div>
                </fieldset>
            @endif
        </div>
    </section>
@endsection