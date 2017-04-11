@extends('admin.layouts.master')

@section('content')
    @if(!count($pizzas))
    <h1>No pizzas yet!</h1>
    @else
    <div class="pizzas">
        {{--<form method="post">--}}
            {{--{{ csrf_field() }}--}}
            <a href="/admin/products/pizzas/add"><button>Add Pizza</button></a>
            {{--<button>Add Pizza</button>--}}
            <table>
                <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Short description</th>
                <th>Price</th>
                <th>Action</th>
                </thead>
                <tbody>
                @foreach($pizzas as $pizza)
                <tr>
                    <td>{{ $pizza->id }}</td>
                    <td>{{ $pizza->pizza_name }}</td>
                    <td><?php echo html_entity_decode($pizza->pizza_short_desc); ?></td>
                    <td>£{{ number_format($pizza->pizza_price, 2) }}</td>
                    <td>
                        <a href=""><button>Edit Pizza</button></a>
                        <button>Delete Pizza</button>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        {{--</form>--}}
    </div>
    @endif
@endsection