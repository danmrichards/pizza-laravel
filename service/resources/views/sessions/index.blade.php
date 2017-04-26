@extends('layouts.master')

@section('content')
    <section id="inset-white">
        <div class="field">

            <h1>Login</h1>

            <form method="POST" action="/login">
                @include('layouts.error')
                {{ csrf_field() }}
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="submit" value="Login">

            </form>
        </div>
    </section>


@endsection

@section('scripts')
    <script>$('form').validate();</script>
@endsection