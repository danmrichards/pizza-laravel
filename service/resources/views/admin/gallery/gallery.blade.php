@extends('admin.layouts.master')
@section('content')
<h1>Gallery images</h1>
<form method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div id="form">
        <input type="file" multiple name="images[]" accept=".jpg,.png">
        <input type="submit" value="Add Images" formaction="/admin/gallery/add">
        <input type="submit" value="Delete Selected" formaction="/admin/gallery/delete">
    </div>
    <div>
        @foreach($images as $image)
        <div id="images">
            <input type="checkbox" name="toRemove[]" value="{{ $image->getFilename() }}" id="{{ $image->getFilename() }}">
            <label for="{{ $image->getFilename() }}">
                <img src="{{ '../'.$image->getPathname() }}">
            </label>
        </div>
        @endforeach
    </div>
</form>
@endsection