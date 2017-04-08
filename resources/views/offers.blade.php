@extends('layouts.master')

@section('content')
    <section id="inset-white">
        <div class="offers-container">
            <p>Place an order over the phone and collect it yourself to get another 10% off your order</p>
        </div>
        <div class="offers-container">
            <p>Buy 1 get 1 free Wednesday - Sunday till 7pm</p>
            <img src="{!! asset('/images/slider/0.jpg') !!}" title="buy one get one free" />
        </div>
        <div class="offers-container">
            <p>£4 pizza for one</p>
            <img src="{!! asset('/images/slider/3.jpg') !!}" title="buy one get one free" />
        </div>

    </section>
@endsection