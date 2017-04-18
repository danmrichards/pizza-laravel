@extends('layouts.master')

@section('content')
    <section id="inset-white">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cost</th>
                    <th>Date ordered</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->cart->total }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td>
                        <a href="/order/view/{{$order->id}}"><button>View</button></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>

@endsection