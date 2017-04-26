@extends('admin.layouts.master')

@section('content')
<h1>Slider configuration</h1>


<div id="slider">
    <form method="POST" action="/admin/slider/add" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div id="form">
            <input type="file" name="slides[]" multiple>
            <input type="submit" value="Add slides">
            <input type="submit" value="Remove selected" formaction="/admin/slider/delete">
        </div>
        @if(count($slides))
        <div>
            <h2>Available slides</h2>
            @foreach($slides as $slide)
            <div id="slides">
                <input type="checkbox" name="selected[]" value="{{ $slide->getFilename() }}" id="{{ $slide->getFilename() }}">
                <label for="{{ $slide->getFilename() }}">
                    <img src="{!! asset('/images/slider/slides') !!}/{{ $slide->getFilename() }}">
                </label>
            </div>
            @endforeach
        </div>
        @endif
    </form>
</div>
@endsection