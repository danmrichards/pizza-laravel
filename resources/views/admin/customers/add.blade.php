@extends('admin.layouts.master')

@section('content')
<h1>Add Customer</h1>
<div id="addCustomer">
    <form action="/admin/customer/create" method="post">
        @include('layouts.error')
        {{ csrf_field() }}
        <label>Name:</label><input type="text" name="name">
        <label>Email:</label><input type="text" name="email">
        <label>Password:</label><input type="password" name="password">
        <label>Retype Password:</label><input type="password" name="password_confirmation">
        <label>&nbsp;</label><input type="submit" name="Add Customer">
    </form>
</div>
@endsection