@extends('admin.layouts.master')

@section('content')
    @if(!isset($users))
        <h1>Sad to say but no customers yet!</h1>
    @endif

    <form action="customer/add" method="GET">
        {{ csrf_field() }}
        <input type="submit" value="Add Customer">
    </form>

    @if(isset($users))
    <table>
        <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Date registered</th>
        <th>Action</th>
        </thead>
        <tbody>
		@foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->created_at }}</td>
            <td class="action">
                <a href="customer/edit/{{ $user->id }}"><button>Edit</button></a>
                <a href="customer/delete/{{ $user->id }}"><button>Delete</button></a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    @endif

@endsection