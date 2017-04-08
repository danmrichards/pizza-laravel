<nav>
    <ul>
        <li>
            <a href="">Menu</a>
            <ul id="dropdown-menu">
                @foreach($activePizzas as $pizza)
                    <li>
                        <a href="/pizza/{{ $pizza->id }}">{{ $pizza->pizza_name }}</a>
                    </li>
                @endforeach
            </ul>
        </li>
        <li><a href="/order">Order</a></li>
        <li><a href="/offers">Offers</a></li>
        <li><a href="/gallery">Gallery</a></li>
        <li><a href="/contact">Contact</a></li>
        <li><a href="/about">About</a></li>
    </ul>
</nav>