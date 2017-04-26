@extends('admin.layouts.master')

@section('content')

    <h1>Order #{{$order->id}}</h1>
    <table>
        <thead>
        <tr>
            <th>Pizza Name</th>
            <th>Pizza Size</th>
            <th>Toppings</th>
            <th>Extras</th>
            <th>Date</th>
        </tr>
        </thead>
        <tbody>
        @foreach($order->cart->cartItems as $cartItem)
        <tr>
            <td>{{ $cartItem->pizzas[0]->pizza_name }}</td>
            <td>{{ $cartItem->bases[0]->base_name }}</td>
            <td>
                @foreach($cartItem->toppings as $topping)
                    {{$topping->topping_name}}
                @endforeach
            </td>
            <td>
                @foreach($cartItem->extras as $extras)
                    {{$extras->extras_name}}
                @endforeach
            </td>
            <td>{{ $cartItem->created_at }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection