<div id="to_top_btn">
    <img src="{!! asset('/images/toTopBtn.png') !!}" alt="back to top"/>
</div>
<footer>
    <div id="footer-wrapper">
        <div class="left">
            <p>
                Pizza Solent - Southampton &copy;
            </p>
        </div>
        <div class="right">
            <ul id="mininav">
                @if(auth()->check())
                <li><a href="/dashboard">Dashboard</a></li>
                <li><a href="/logout">Logout</a></li>
                @else
                <li><a href="/login">Login</a></li>
                <li><a href="/register">Register</a></li>
                @endif
            </ul>
        </div>
        <div class="clear"></div>
    </div>
</footer>


<script src="{!! asset('/js/jquery.validate.js') !!}"></script>
<script type="text/javascript" src="{!! asset('/js/script.js') !!}"></script>
@yield('scripts')
</body>
</html>
