@extends('admin.layouts.master')

@section('content')
    <div id="addPizza">
        <form method="POST" action="/admin/products/pizzas/add" enctype="multipart/form-data">
            {{ csrf_field() }}
            @include('layouts.error')
            <div class="normal">

                <label>Name: </label>
                <input type="text" name="pizza_name">

                <label>Price: </label>
                <input type="number" name="pizza_price" step="0.01">

                <input type="checkbox" name="active"><span>Active</span>

                <label>&nbsp;</label>
                <input type="submit" value="Add">

            </div>

            <label>Short description: </label>
            <textarea name="pizza_short_desc"></textarea>

            <label>Description: </label>
            <textarea name="pizza_desc"></textarea>

            <input type="file" name="images[]" multiple accept=".png,.jpg">
        </form>
    </div>
@endsection
@section('scripts')
    <script src="//cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script src="{!! asset('/js/tinymce.js') !!}"></script>
@endsection
