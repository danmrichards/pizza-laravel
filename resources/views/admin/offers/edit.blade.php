@extends('admin.layouts.master')

@section('content')


    <h1>Add offer</h1>
    <div id="offer">
        <form action="/admin/offers/update/{{$offer->id}}" method="POST" enctype="multipart/form-data">
            @include('layouts.error')
            {{ csrf_field() }}
            <div>
                <label>Offer ID</label>
                <input type="text" name="offer_id" value="{{ $offer->id }}" readonly>
            </div>
            <div>
                <label>Offer name</label>
                <input type="text" name="offer_name" value="{{ $offer->offer_name }}">
            </div>
            <div>
                <label>Offer description</label>
                <textarea name="offer_desc">{{ $offer->offer_desc }}</textarea>
            </div>
            <div>
                <label>Offer Image</label>
                <input type="file" name="image" accept=".jpg,.png">
            </div>
            @if(isset($offer->image_name))
            <div>
                <input type="checkbox" name="deleteImage" value="{{ $offer->image_name }}" id="{{ $offer->image_name }}">
                <label for="{{ $offer->image_name }}"><img src="{!! asset('/images/offers') !!}/{{ $offer->image_name }}"></label>
                <input type="submit" value="Delete Image" formaction="/admin/offers/remove/{{$offer->id}}">
            </div>
            @endif
            <input type="submit" value="Update offer">
        </form>
    </div>
@endsection

@section('scripts')
    <script src="//cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script src="{!! asset('/js/tinymce.js') !!}" type="text/javascript"></script>
@endsection
