$(function(){
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var inputs = $('#choices').find('input');
    inputs.each(function(){
        if($(this).prop('checked') == true){
            updateField();
        }
    });

    $('.pizza_container img').on('mouseover', function(){
        $(this).animate({
            'opacity': 0
        }, 1000);
        $(this).prev().css('display', 'block').animate({
            'opacity': 1
        }, 1000);
    });

    $('.pizza_container img').on('mouseleave', function(){
        $(this).animate({
            'opacity': 1
        }, 1000);
        $(this).prev().animate({
            'opacity': 0
        }, 1000, function(){
            $(this).css('display', 'none');
        });
    });

    $('button[type=reset]').on('click', function(){
        $('input[type=radio]').prop('checked', false);
        $('input[type=checkbox]').prop('checked', false);
    });


    $('input[type=radio]').on('click',function(){
        updateField();
    });
    $('input[type=checkbox]').on('click',function(){
        updateField();
    });

    $('#basket-btn').on('click', function(){
        if($('#basket').css('right') == '0px'){
            $('#basket').animate({
                'right': '-305px'
            }, 1000);
        }else{
            $('#basket').animate({
                'right': '0px'
            }, 1000);
        }
    });

    $('#order-form button[type=reset]').on('click', function(){
        var inputs = $('#choices').find('input');
        inputs.each(function(){
            $(this).removeAttr('checked');
        });
    });

    $('#order-form').on('submit', function(e){
        e.preventDefault();
        var url = $(this).attr('action');
        var formData = $(this).serializeArray();
        $.ajax({
            type: 'POST',
            data: formData,
            url: url,
            success: function(data){
                var response = JSON.parse(data);
                if(response == null){
                    return false;
                }
                $('#empty-basket').remove();
                // add cart item to cart
                $('#total-box').append(addCartItem(response));
                // slide cart out
                if($('#basket-footer').length === 0){
                    $('#total-box').append(cartFooter(response));
                }
                updateTotalBoxTotalValue();
                $('#basket').animate({
                    'right': '0px'
                }, 1000, function(){
                    setTimeout(function(){
                        $('#basket').animate({
                            'right': '-305px'
                        }, 1000)
                    }, 3000);
                });
                // reset form
                $('#order-form').trigger('reset');
            }
        });

    });

    $('.before').on('click', function(e){
        e.preventDefault();
        var clicked = $(this);
        var url = $(this).parent().attr('href');
        $.get(url, function(data){
            if(data === 'done'){
                clicked.closest('div.order-item').slideUp('slow', function(){
                    $(this).remove();
                    if($('.order-item').length == 0){
                        $('#basket-footer').remove();
                        $('#total-box').append('<p id="empty-basket">Nothing in your basket yet!</p>');
                    }
                });
            }
        });
    });


});

function updateField(){
    var inputs = $('#choices').find('input');
    var value = 0;
    inputs.each(function(){
        if($(this).prop('checked') == true){
            var clicked_val = parseFloat($(this).siblings('.price').text());
            value += clicked_val;
        }
    });
    value = value.toFixed(2);
    $('#update').text(value);
    $('input[name=total]').val(value);
    $('#update').addClass('show-price');
    setTimeout(function(){
        $('#update').removeClass('show-price');
    }, 750);
}

function addCartItem(response){
    
    var pizza_price = parseFloat(response.pizza_price);
    var base_price = parseFloat(response.base_price);
    productPrice = pizza_price + base_price;
    var cartItem = '<div class="order-item">\
        <a href="/cart/remove/'+ response.id +'"><div class="before"></div></a>\
        <div>\
        <div class="pizza">\
        <span class="left product_name">'+response.pizza_name + ' ' + response.pizza_base +'</span>\
    <span class="right product_price">'+ productPrice.toFixed(2) +'</span>\
    </div>';

    if(response.toppings.length > 0){
        for(var i = 0; i < response.toppings.length; i++){
            cartItem += '<div class="topping">\
                <span class="left product_name">'+ response.toppings[i] +'</span>\
                <span class="right product_price">'+ response.toppings_prices[i].toFixed(2) +'</span>\
            </div>';
        }
    }

    if(response.extras.length > 0){
        for(var i = 0; i < response.extras.length; i++){
            cartItem += '<div class="extras">\
                <span class="left product_name">'+ response.extras[i] +'</span>\
                <span class="right product_price">'+ response.extras_prices[i].toFixed(2) +'</span>\
            </div>';
        }
    }
    cartItem += '<div class="subtotal">'+ response.subtotal +'</div>\
            <div class="clear"></div>\
        </div>\
    </div>';
    return cartItem;

}

function updateTotalBoxTotalValue() {
    var total = 0;
    $('#total-box .subtotal').each(function(){
        var subtotal = parseFloat($(this).text());
        total += subtotal;
    });
    $('#total').text(total.toFixed(2));
}

function cartFooter(response){
    var cartFooter =
        '<div id="basket-footer">\
            <span id="total" class="right"></span>\
            <a href="/cart/checkout/' + response.cart_id + '"  id="checkout">\
                <button type="button">Checkout</button>\
            </a>\
        </div>';

    return cartFooter;

}