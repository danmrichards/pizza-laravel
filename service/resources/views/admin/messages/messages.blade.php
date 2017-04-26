@extends('admin.layouts.master')

@section('content')
    <table>
        <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Surname</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Date</th>
        <th>Action</th>
        </thead>
        <tbody>
        @foreach($messages as $message)
        <tr @if(!$message->read){{ "style=font-weight:bold;" }} @endif>
            <td>{{ $message->id }}</td>
            <td>{{ $message->name }}</td>
            <td>{{ $message->surname }}</td>
            <td>{{ $message->email }}</td>
            <td>{{ $message->phone }}</td>
            <td>{{ $message->created_at }}</td>
            <td class="action">
                <a href="/admin/message/read/{{ $message->id }}"><button>Read</button></a>
                <a href="/admin/message/delete/{{ $message->id }}"><button>Delete</button></a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection