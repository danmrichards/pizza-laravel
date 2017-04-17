<section>
    <div id="basket">
        <img src="{!! asset('images/basket.png') !!}" alt="basket" id="basket-btn">
        <div id="total-box">
            <h2>Order summary</h2>
            @if(isset($cart))
                @foreach($cart->cartItems as $cartItem)
                    @include('layouts.cart.cart-item')
                @endforeach
                @include('layouts.cart.cart-footer')
            @else
                <p id="empty-basket">Nothing in your basket yet!</p>
            @endif

            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>
</section>