@extends('admin.layouts.master')

@section('content')
    <div id="addPizza">
        <a href="/admin/products/toppings/add"><button type="button">Add Topping</button></a>
        <table>
            <thead>
            <th>ID</th>
            <th>Topping Name</th>
            <th>Topping price</th>
            <th>Action</th>
            </thead>
            <tbody>
            @foreach($toppings as $topping)
            <tr>
                <td>{{$topping->id}}</td>
                <td>{{$topping->topping_name}}</td>
                <td>{{ number_format($topping->topping_price, 2) }}</td>
                <td>
                    <a href="/admin/products/toppings/edit/{{$topping->id}}"><button type="button">Edit</button></a>
                    <a href="/admin/products/toppings/delete/{{$topping->id}}"><button type="button">Delete</button></a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection