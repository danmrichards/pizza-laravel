@extends('admin.layouts.master')

@section('content')
<h1>Bases</h1>
<a href="/admin/products/bases/add"><button type="button">Add Base</button></a>
<table>
    <thead>
    <th>ID:</th>
    <th>Base Name:</th>
    <th>Base price:</th>
    <th>Action:</th>
    </thead>
    <tbody>
    @foreach($bases as $base)
    <tr>
        <td>{{ $base->id }}</td>
        <td>{{ $base->base_name }}</td>
        <td>{{ number_format($base->base_price, 2) }}</td>
        <td>
            <a href="/admin/products/bases/edit/{{$base->id}}"><button type="button">Edit</button></a>
            <a href="/admin/products/bases/delete/{{$base->id}}"><button type="button">Delete</button></a>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
@endsection