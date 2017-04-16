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
                console.log(response);
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