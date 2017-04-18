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
                <div class="clear"></div>
                <div class="summary-wrapper">
                    <div class="right">
                        <span class="left">Total</span>
                        <span class="right price">{{ number_format($cart->cart->total, 2) }}</span>
                    </div>
                <div class="clear"></div>
                </div>
                <hr />
                <div class="summary-wrapper">
                    @if(Auth::check())
                        <div>
                            <h2>Delivery details</h2>
                            <form method="POST" action="/order/{{ $cart->id }}">
                                @include('layouts.error')
                                {{ csrf_field() }}
                                <input type="text" name="number" placeholder="House No" value="{{ $address->number }}">
                                <input type="text" name="street_name" placeholder="Street Name" value="{{ $address->street_name }}">
                                <input type="text" name="post_code" placeholder="Post Code" value="{{ $address->post_code }}">
                                <input type="text" name="city" placeholder="City" value="{{ $address->city }}">
                                <div class="right">
                                    <button type="submit">Order</button>
                                </div>
                            </form>
                        <div>

                            </div>
                        </div>
                    @else
                        <div class="left">
                            <div class="loginButton">
                                <a href="/login">
                                    <button type="button">Login</button>
                                </a>
                            </div>
                        </div>
                        <div class="right">
                            <div class="registerButton">
                                <a href="/register">
                                    <button type="button">Register</button>
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </fieldset>


        </div>
    </section>
@endsection