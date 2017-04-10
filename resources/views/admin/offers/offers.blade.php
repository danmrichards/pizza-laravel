@extends('admin.layouts.master')


@section('content')
    @if(!count($offers))
        <p>Sorry, no offers yet!</p>
    @endif
    <a href="/admin/offers/add"><button>Add offer</button></a>
    @if(count($offers))
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($offers as $offer)
            <tr>
                <td>{{ $offer->id }}</td>
                <td>{{ $offer->offer_name }}</td>
                <td><?php echo html_entity_decode($offer->offer_desc); ?></td>
                <td>
                    @if(isset($offer->image_name))
                    <img class="offer-image" src="{!! asset("/images/offers/") !!}{{ '/'.$offer->image_name }}">
                    @endif
                </td>
                <td>
                    <a href="/admin/offers/edit/{{ $offer->id }}"><button>Edit</button></a>
                    <a href="/admin/offers/delete/{{ $offer->id }}"><button>Delete</button></a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection