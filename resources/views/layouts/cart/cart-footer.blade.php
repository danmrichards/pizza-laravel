<div id="basket-footer">
    <span id="total" class="right">{{ number_format($cart->total, 2) }}</span>
    <a href="/cart/checkout/{{$cart->id}}"  id="checkout">
        <button type="button">Checkout</button>
    </a>
</div>
