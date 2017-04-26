@extends('layouts.master')

@section('content')
<section id="inset-white">
    <div class="field">
        <h1>Pizza {{ $pizza->pizza_name }}</h1>
        <aside id="product_gallery" class="left">
            <div class="main">
                <img src="{!! asset('images/pizzas') !!}/{{ $pizza->id.'/'.$images[0]->getFilename() }}" />
                <div class="overlay_small">
                    <p>
                        Click to enlarge
                    </p>
                </div>
            </div>
            <div class="miniature">
            @foreach($images as $image)
                <img src="{!! asset('images/pizzas') !!}/{{ $pizza->id.'/'.$image->getFilename() }}" />
            @endforeach
            </div>
        </aside>
        <aside id="description" class="right">
            <article>
                <?php echo html_entity_decode($pizza->pizza_short_desc); ?>
                <a href="/order/{{$pizza->id}}"><button class="button">Order</button></a>
            </article>
        </aside>
        <div class="clear"></div>
        <article>
            <h1>Brief description</h1>
            <?php echo html_entity_decode($pizza->pizza_desc); ?>
        </article>
    </div>
</section>
<div id="overlay">
    <div class="close_button">
        <img src="{!! asset('images/button_close_2.png') !!}" alt="close" />
    </div>
    <div class="gallery_main_image">
        <img src="{!! asset('images/pizzas') !!}/{{ $pizza->id.'/'.$images[0]->getFilename() }}" alt="image" />
    </div>
    <div class="images_list">
        @foreach($images as $image)
            <img src="{!! asset('images/pizzas') !!}/{{ $pizza->id.'/'.$image->getFilename() }}" />
        @endforeach
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript" src="{!! asset('js/pizza-page.js') !!}"></script>
@endsection
