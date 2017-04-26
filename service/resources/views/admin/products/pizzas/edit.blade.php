@extends('admin.layouts.master')

@section('content')
    <div id="editPizza">
        <form method="POST" action="/admin/products/pizzas/update/{{$pizza->id}}" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="normal">
                <label>ID: </label><input type="text" name="id" readonly value="{{ $pizza->id }}">
                <label>Name: </label><input type="text" name="pizza_name" value="{{ $pizza->pizza_name }}">
                <label>Price: </label><input type="number" name="pizza_price" step="0.01" value="{{ number_format($pizza->pizza_price, 2) }}">
                <input type="checkbox" name="active" @if($pizza->active){{ 'checked' }} @endif><span>Active</span>
                <fieldset id="images">
                    <legend>Images</legend>
                    @foreach($images as $image)
                        <input type="checkbox" name="existingImages[]" value="{{$image->getFilename()}}" id="{{$image->getFilename()}}">
                        <label for="{{$image->getFilename()}}">
                            <img class="thumbnails" src="{!! asset('images/pizzas/').'/'.$pizza->id.'/'.$image->getFilename() !!}">
                        </label>
                    @endforeach
                    <label>&nbsp;</label>
                    <input type="submit" value="Remove selected" id="removeSelected" formaction="/admin/products/pizzas/remove_images">
                    <div>
                        <input type="file" name="images[]" multiple accept=".png,.jpg,.jpeg">
                        <label>&nbsp;</label><input type="submit" formaction="/admin/products/pizzas/add_images" value="Upload new pictures">
                    </div>
                </fieldset>
            </div>
            <label>Short description: </label>
            <textarea name="pizza_short_desc">{{ $pizza->pizza_short_desc }}</textarea>
            <label>Description: </label>
            <textarea name="pizza_desc">{{ $pizza->pizza_desc }}</textarea>
            <label>&nbsp;</label><a href="/admin/products/pizzas"><button type="button">Cancel</button></a>
            <label>&nbsp;</label><input type="submit" value="Save">
        </form>
    </div>
@endsection
@section('scripts')
    <script src="//cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script src="{!! asset('/js/tinymce.js') !!}"></script>
@endsection
