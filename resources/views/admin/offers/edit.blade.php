@extends('admin.layouts.master')

@section('content')


    <h1>Add offer</h1>
    <div id="offer">
        <form action="../offer/update" method="post" enctype="multipart/form-data">
            <div>
                <label>Offer ID</label>
                <input type="text" name="offerID" value="{{ $offer->id }}" readonly>
            </div>
            <div>
                <label>Offer name</label>
                <input type="text" name="offerName" value="{{ $offer->offer_name }}" required>
            </div>
            <div>
                <label>Offer description</label>
                <textarea name="offerDesc">{{ $offer->offer_desc }}</textarea>
            </div>
            <div>
                <label>Offer Image</label>
                <input type="file" name="offerImage" accept=".jpg,.png">
            </div>
            @if(isset($offer->image_name))
            <div>
                <input type="checkbox" name="deleteImage" value="" id="{{ $offer->image_name }}">
                <label for="{{ $offer->image_name }}"><img src="{!! asset('/images/offers') !!}/{{ $offer->image_name }}"></label>
                <input type="submit" value="Delete Image" formaction="../offer/deleteImage/">
            </div>
            @endif
            <input type="submit" value="Add offer">
        </form>
    </div>
@endsection

@section('scripts')
    <script src="//cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script src="{!! asset('/js/tinymce.js') !!}" type="text/javascript"></script>
@endsection
