@extends('admin.layouts.master')

@section('content')
    <div id="addPizza">
        <form action="/admin/products/extras/update/{{$extra->id}}" method="POST">
            @include('layouts.error')
            {{csrf_field()}}
            <label>ID:</label><input type="text" name="id" value="{{$extra->id}}" readonly>
            <label>Extras Name:</label><input type="text" name="extras_name" value="{{$extra->extras_name}}">
            <label>Extras Price:</label><input type="number" name="extras_price" step="0.01" value="{{number_format($extra->extras_price, 2)}}">
            <input type="checkbox" name="active" @if($extra->active) checked @endif><label for="active">Active</label>
            <input type="submit" value="Update Extra">
        </form>
    </div>
@endsection