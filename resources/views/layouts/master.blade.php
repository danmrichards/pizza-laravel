<!DOCTYPE html>
<html>
    <head>
        @yield('title')
        <title>SOLENT pizzas, best pizzas in Hampshire</title>
        <link rel="stylesheet" type="text/css" href="{!! asset('css/styles.css') !!}" />
        <script type="text/javascript" src="{!! asset('/js/jquery-3.2.0.min.js') !!}"></script>
    </head>
    <body>
        <div id="wrapper">
            @include('layouts.header')

            @yield('content')
        </div>
            @include('layouts.footer')

