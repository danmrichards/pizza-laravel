@extends('admin.layouts.master')

@section('content')
    <div id="addPizza">
        @include('layouts.error')
        <form action="/admin/products/toppings/update/{{$topping->id}}" method="POST">
            {{csrf_field()}}
            <label>ID:</label><input type="text" name="topping_id" value="{{$topping->id}}" readonly>
            <label>Topping Name:</label><input type="text" name="topping_name" value="{{$topping->topping_name}}">
            <label>Topping Price:</label><input type="number" name="topping_price" step="0.01" value="{{number_format($topping->topping_price, 2)}}">
            <input type="checkbox" name="active" @if($topping->active) checked @endif><label for="active">Active</label>
            <input type="submit" value="Update Topping">
        </form>
    </div>
@endsection