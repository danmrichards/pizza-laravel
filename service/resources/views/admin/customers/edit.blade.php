@extends('admin.layouts.master')

@section('content')
    <h1>Edit Customer</h1>
    <div id="editCustomer">
        <form action="/admin/customer/update" method="POST">
            {{ csrf_field() }}
            <label>ID:</label><input type="text" name="id" value="{{ $user->id }}" readonly="true">
            <label>Name:</label><input type="text" name="name" value="{{ $user->name }}">
            <label>Password:</label><input type="password" name="password" value="{{ $user->password }}">
            <label>Email:</label><input type="text" name="email" value="{{ $user->email }}">
            <label>Admin: </label><input type="checkbox" name="isAdmin" @if($user->isAdmin) checked @endif>
            <label>&nbsp;</label><input type="submit" name="Update Customer">
        </form>
    </div>
@endsection