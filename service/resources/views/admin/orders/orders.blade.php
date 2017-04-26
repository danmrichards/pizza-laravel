@extends('admin.layouts.master')


@section('content')
    <h1>Orders</h1>
    <form action="order/view" method="post">
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Order date</th>
                <th>User ID</th>
                <th>Total Cost</th>
                <th>Paid</th>
                <th>Delivered</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
			@foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->created_at }}</td>
                <td>{{ $order->user->name }}</td>
                <td>{{ $order->cart->total }}</td>
                <td>{{ $order->paid }}</td>
                <td>{{ $order->delivered }}</td>
                <td>
                    <a href="/admin/order/view/{{$order->id}}">
                        <button type="button">View Details</button>
                    </a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </form>
@endsection