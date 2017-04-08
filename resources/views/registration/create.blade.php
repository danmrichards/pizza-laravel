@extends('layouts.master')

@section('content')
    <section id="inset-white">
        <div class="field">

            <h1>Register</h1>

            <form method="POST" action="/register">
                @include('layouts.error')
                {{ csrf_field() }}

                <input type="text" name="username" placeholder="Username" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="password" name="password_confirmation" placeholder="Retype Password" required>
                <input type="submit" value="Register">

            </form>
        </div>
    </section>
@endsection

@section('scripts')
    <script>$('form').validate();</script>
@endsection