@extends('layouts.master')

@section('content')
    <section id="inset-white">
        <div class="field">
            <h1>Hello, {{ auth()->user()->name }}</h1>
            <a href="/orders"><button>View orders</button></a>
        </div>

    </section>
@endsection