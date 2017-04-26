@extends('admin.layouts.master')

@section('content')
    <div id="addPizza">
        <a href="/admin/products/extras/add"><button type="button">Add Extras</button></a>
        <table>
            <thead>
            <th>ID</th>
            <th>Extra Name</th>
            <th>Extra price</th>
            <th>Action</th>
            </thead>
            <tbody>
            @foreach($extras as $extra)
            <tr>
                <td>{{ $extra->id }}</td>
                <td>{{ $extra->extras_name }}</td>
                <td>{{ number_format($extra->extras_price, 2) }}</td>
                <td>
                    <a href="/admin/products/extras/edit/{{$extra->id}}"><button type="button">Edit</button></a>
                    <a href="/admin/products/extras/delete/{{$extra->id}}"><button type="button">Delete</button></a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection