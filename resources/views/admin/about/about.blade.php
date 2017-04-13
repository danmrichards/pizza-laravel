@extends('admin.layouts.master')


@section('content')
    <h1>About us</h1>
    <form action="/admin/about/{{$about->id}}" method="POST">
        @include('layouts.error')
        {{ csrf_field() }}
        <textarea name="about">{{$about->about}}</textarea>
        <input type="submit" value="Cancel" formaction="/admin">
        <input type="submit" value="Update">
    </form>
@endsection
@section('scripts')
    <script src="//cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script src="{!! asset('/js/tinymce.js') !!}"></script>
@endsection