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
                // add cart item to cart
                $('#basket-footer').prepend(addCartItem(response));
                // slide cart out
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

function addCartItem(data){
    var pizza_price = parseFloat(data.pizza_price);
    var base_price = parseFloat(data.base_price);
    productPrice = pizza_price + base_price;
    var cartItem = '<div class="order-item">\
        <div>\
        <div class="pizza">\
        <span class="left product_name">'+data.pizza_name + ' ' + data.pizza_base +'</span>\
    <span class="right product_price">'+ productPrice.toFixed(2) +'</span>\
    </div>';

    if(data.toppings.length > 0){
        for(var i = 0; i < data.toppings.length; i++){
            cartItem += '<div class="topping">\
                <span class="left product_name">'+ data.toppings[i] +'</span>\
                <span class="right product_price">'+ data.toppings_prices[i].toFixed(2) +'</span>\
            </div>';
        }
    }

    if(data.extras.length > 0){
        for(var i = 0; i < data.extras.length; i++){
            cartItem += '<div class="extras">\
                <span class="left product_name">'+ data.extras[i] +'</span>\
                <span class="right product_price">'+ data.extras_prices[i].toFixed(2) +'</span>\
            </div>';
        }
    }
    cartItem += '<div class="subtotal">'+ data.subtotal +'</div>\
            <div class="clear"></div>\
        </div>\
    </div>';

    return cartItem;

}