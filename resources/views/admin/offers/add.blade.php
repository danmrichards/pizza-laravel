@extends('admin.layouts.master')

@section('content')

    <h1>Add offer</h1>
    <div id="offer">
        <form action="/admin/offers/add" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div>
                <label>Offer name</label>
                <input type="text" name="offer_name">
            </div>
            <div>
                <label>Offer description</label>
                <textarea name="offer_desc"></textarea>
            </div>
            <div>
                <label>Offer Image</label>
                <input type="file" name="image" accept=".jpg,.png">
            </div>
            <input type="submit" value="Add offer">
        </form>
    </div>

@endsection

@section('scripts')
    <script src="//cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script src="{!! asset('/js/tinymce.js') !!}" type="text/javascript"></script>
@endsection

