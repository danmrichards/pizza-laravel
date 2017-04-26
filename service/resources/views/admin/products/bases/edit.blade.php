@extends('admin.layouts.master')

@section('content')
    <div id="addPizza">
        <form action="/admin/products/bases/update/{{$base->id}}" method="POST">
            @include('layouts.error')
            {{csrf_field()}}
            <label>ID:</label><input type="text" name="id" value="{{$base->id}}" readonly>
            <label>Base Name:</label><input type="text" name="base_name" value="{{$base->base_name}}">
            <label>Base Price:</label><input type="number" name="base_price" step="0.01" value="{{number_format($base->base_price, 2)}}">
            <input type="checkbox" name="active" @if($base->active) checked @endif><label for="active">Active</label>
            <input type="submit" value="Update Base">
        </form>
    </div>
@endsection