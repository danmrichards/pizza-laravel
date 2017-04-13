@extends('admin.layouts.master')

@section('content')

    <h1>Add Extras</h1>
    <div id="addPizza">
        <form action="/admin/prodcuts/extras/create" method="POST">
            @include('layouts.error')
            {{ csrf_field() }}
            <label>Extras Name:</label><input type="text" name="extras_name">
            <label>Extras Price:</label><input type="number" name="extras_price" step="0.01">
            <input type="checkbox" name="active"><label for="active">Active</label>
            <input type="submit" value="Add Extras">
        </form>
    </div>
@endsection