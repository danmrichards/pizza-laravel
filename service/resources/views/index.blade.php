@extends('layouts.master')

@section('content')
    @if(count($slides))
    <div id="slider">
        <div id="left-arrow">
            <img src="{!! asset('images/slider/controls/left-arrow-lg.png') !!}" alt="left arrow">
        </div>
        @foreach($slides as $slide)
            <img src="{!! asset('images/slider/slides') !!}/{{$slide->getFilename()}}" />
        @endforeach
        <div id="right-arrow">
            <img src="{!! asset('images/slider/controls/right-arrow-lg.png') !!}" alt="left arrow">
        </div>
    </div>
    @endif
    <section id="inset-white">
        <article id="history">
            <aside class="left">
                <h1>History of pizza</h1>
                <p>The word "pizza" was first documented in 997 AD in Gaeta, Italy, and successively in different parts of Central and Southern Italy. The precursor of pizza was probably the focaccia, a flat bread known to the Romans as "panis focacius", to which toppings were then added.
                </p>
            </aside>
            <aside class="right">
                <img src="{!! asset('images/pizzeria.jpg') !!}" alt="restaurant">
            </aside>
            <div class="clear"></div>
        </article>
        <article id="more">
            <aside class="left">
                <img src="{!! asset('images/slice.jpg') !!}" alt="pizza slice">
                <h1>Delivery</h1>
                <p>
                    FREE within 3 miles radius on orders over &pound;10
                </p>
                <p>
                    &pound;2 over 3 miles radius
                </p>
            </aside>
            <aside class="right">
                <h1>Offers</h1>
                <ul>
                    <li>
                        Place an order over the phone and collect it yourself to get another 10% off your order
                    </li>
                    <li>
                        Buy 1 get 1 free Wednesday - Sunday till 7pm
                    </li>
                    <li>
                        &pound;4 pizza for one
                    </li>
                </ul>
            </aside>
            <div class="clear"></div>
        </article>
    </section>
@endsection

@section('scripts')
    <script type="text/javascript" src="{!! asset('js/slider.js') !!}"></script>
@endsection