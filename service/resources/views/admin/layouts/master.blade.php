@include('admin.layouts.header')

@include('admin.layouts.top_menu')

@include('admin.layouts.left')

    <div id="content">
        @if($flash = session('message'))
        <div class="message">
            {{$flash}}
        </div>
            <script>
                $(document).ready(function(){
                    setTimeout(function(){
                        $('.message').fadeOut(1000);
                    },2000)
                });
            </script>
        @endif
        @yield('content')
@include('admin.layouts.footer')