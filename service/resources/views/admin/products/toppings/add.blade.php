@extends('admin.layouts.master')

@section('content')
    <div id="addPizza">
        <form action="/admin/prodcuts/toppings/create" method="POST">
            @include('layouts.error')
            {{csrf_field()}}
            <label>Topping Name:</label><input type="text" name="topping_name">
            <label>Topping Price:</label><input type="number" name="topping_price" step="0.01">
            <input type="checkbox" name="active"><label for="active">Active</label>
            <input type="submit" value="Add Topping">
        </form>
    </div>
@endsection