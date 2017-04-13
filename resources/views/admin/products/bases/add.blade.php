@extends('admin.layouts.master')

@section('content')

<h1>Add base</h1>
<div id="addPizza">
    <form action="/admin/prodcuts/bases/create" method="POST">
        @include('layouts.error')
        {{ csrf_field() }}
        <label>Base Name:</label><input type="text" name="base_name">
        <label>Base Price:</label><input type="number" name="base_price" step="0.01">
        <input type="checkbox" name="active"><label for="active">Active</label>
        <input type="submit" value="Add Base">
    </form>
</div>
@endsection