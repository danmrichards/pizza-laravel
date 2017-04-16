@extends('layouts.master')
@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('content')
    <section id="inset-white">
        <form method="POST" action="/cart/add" id="order-form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="total" value="0">
            <aside id="choices">
                <p class="orderError"></p>
                <fieldset id="pizza">
                    <legend>Select a pizza*</legend>

                    @foreach($pizzas as $p)
                    <div class="pizza_container">
                        <div>
                            <?php echo html_entity_decode($p->pizza_short_desc); ?>
                            <img src="{!! asset('images/pizzas/').'/'.$p->id.'/'.$images[$p->id]->getFilename() !!}" alt="Pizza ">
                        </div>
                        <div>
                            <label>
                                <input type="radio" name="pizza" value="{{ $p->id }}" @if(isset($pizza) && $pizza->id == $p->id) {{'checked'}} @endif>
                                <span class="name">{{$p->pizza_name}}</span>
                                <span class="price">{{number_format($p->pizza_price, 2)}}</span>
                            </label>
                        </div>
                    </div>
                    @endforeach

                </fieldset>

                <fieldset id="base">
                    <legend>Select a base*</legend>
                    @foreach($bases as $base)
                    <label>
                        <input type="radio" name="base" value="{{ $base->id }}">
                        <span class="name">{{$base->base_name}}</span>
                        <span class="price">{{number_format($base->base_price, 2)}}</span>
                    </label><br />
                    @endforeach

                </fieldset>

                <fieldset id="topping">
                    <legend>Select one or more topping*</legend>
                    @foreach($toppings as $top)
                    <label>
                        <input type="checkbox" name="toppings[]" value="{{ $top->id }}">
                        <span class="name">{{ $top->topping_name }}</span>
                        <span class="price">{{ number_format($top->topping_price, 2) }}</span>
                    </label><br />
                    @endforeach
                </fieldset>

                <fieldset id="extras">
                    <legend>Extras</legend>
                    @foreach($extras as $extra)
                    <label>
                        <input type="checkbox" name="extras[]" value="{{ $extra->id }}">
                        <span class="name">{{ $extra->extras_name }}</span>
                        <span class="price">{{ number_format($extra->extras_price, 2) }}</span>
                    </label><br />
                    @endforeach
                </fieldset>

                <div id="buttons">
                    <button type="reset">Reset</button>
                    <button type="submit">Add to Order</button>
                </div>
            </aside>
        </form>
    </section>

    @include('layouts.cart.cart')

    <div id="update">0.00</div>

@endsection

@section('scripts')
    <script type="text/javascript" src="{!! asset('/js/order.js') !!}"></script>
@endsection