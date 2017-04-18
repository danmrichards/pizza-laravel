<div id="basket-footer">
    <span id="total" class="right">{{ number_format($cart->total, 2) }}</span>
    <form action="/cart/checkout/{{$cart->id}}" method="GET">
        {{ csrf_field() }}
        <input type="submit" value="Checkout" class="left">
    </form>
</div>