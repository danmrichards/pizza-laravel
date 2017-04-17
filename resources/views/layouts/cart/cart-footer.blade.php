<div id="basket-footer">
    <span id="total" class="right">{{ number_format($cart->total, 2) }}</span>
    <form action="/order/checkout/{{$cart->id}}" method="POST">
        {{ csrf_field() }}
        <input type="submit" value="Order" class="left">
    </form>
</div>