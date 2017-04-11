@extends('layouts.master')

@section('content')
    <section id="inset-white">
        <div class="field">
            @if(isset($pizza))

            <h1>Order {{$pizza->pizza_name}}</h1>

            @else

            <h1>Order</h1>

            @endif
        </div>
    </section>
@endsection