<div class="order-item">
    <div>
        <div class="pizza">
            <span class="left product_name">
                {{ $cartItem->pizzas[0]->pizza_name . ' ' . $cartItem->bases[0]->base_name}}
            </span>
            <span class="right product_price">
                {{ number_format($cartItem->pizzas[0]->pizza_price + $cartItem->bases[0]->base_price, 2) }}
            </span>
        </div>

        @if(count($cartItem->toppings))
            @foreach($cartItem->toppings as $topping)
                <div class="topping">
                    <span class="left product_name">{{ $topping->topping_name }}</span>
                    <span class="right product_price">{{ number_format($topping->topping_price, 2) }}</span>
                </div>
            @endforeach
        @endif

        @if(count($cartItem->extras))
            @foreach($cartItem->extras as $extras)
                <div class="extras">
                    <span class="left product_name">{{ $extras->extras_name }}</span>
                    <span class="right product_price">{{ number_format($extras->extras_price, 2) }}</span>
                </div>
            @endforeach
        @endif
        <div class="subtotal">{{ number_format($cartItem->subtotal, 2) }}</div>
        <div class="clear"></div>
    </div>
</div>