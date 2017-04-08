@extends('layouts.master')

@section('content')
    <section id="inset-white">
        @foreach($images as $image)
            <div class="wrap">
                <img src="{{ $image->getPathname() }}" title="image">
                <div class="click-to-enlarge">Click to enlarge</div>
            </div>
        @endforeach
        <div id="gallery-overlay">
            <div class="close-btn">
                <img src="{!! asset('/images/button_close_2.png') !!}" title="Close Button" />
            </div>
            <div class="gallery-main-img">
                <img src="" alt="image">
            </div>
            <div class="images-list">

            </div>
        </div>
    </section>
@endsection