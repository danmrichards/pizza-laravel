@extends('layouts.master')

@section('content')
    <section id="inset-white">
        @foreach($offers as $offer)
        <div class="offers-container">
            <?php echo html_entity_decode($offer->offer_desc); ?>
            @if($offer->image_name)
                <img src="{!! asset('images/offers') !!}/{{$offer->image_name}}" />
            @endif
        </div>
        @endforeach
    </section>
@endsection