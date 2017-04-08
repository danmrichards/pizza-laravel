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
                <li><a href="/order">Order</a></li>
                <li><a href="/offers">Offers</a></li>
                <li><a href="/gallery">Gallery</a></li>
                <li><a href="/contact">Contact</a></li>
                <li><a href="/about">About</a></li>
            </ul>
        </div>
        <div class="clear"></div>
    </div>
</footer>


@yield('scripts')
<script type="text/javascript" src="{!! asset('/js/script.js') !!}"></script>
</body>
</html>
