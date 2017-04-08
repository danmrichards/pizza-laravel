$(document).ready(function(){
    $('nav>ul>li>a').first().on('click', function(e){
        e.preventDefault();
    });

    $('nav>ul>li').first().on('mouseover', function(){
        var left = $(this).parent().parent().offset().left;
        var top = $(this).parent().offset().top + $(this).height();
        $('#dropdown-menu').css({
            'left': left + 'px',
            'top': top + 'px'
        });
        $("#dropdown-menu").slideDown(500);
    });

    $('nav>ul>li').first().on('mouseleave', function(){
        $("#dropdown-menu").slideUp(500);
    });


    $('.wrap').on('mouseover', function(){
        $(this).find('div.click-to-enlarge').animate({
            'opacity': 1
        }, 750);
        $('.wrap').not(this).each(function(){
            $(this).find('img').addClass('darken');
        });
        $(this).find('img').removeClass();
    });

    $('.wrap').on('mouseleave', function(){
        $(this).find('div.click-to-enlarge').animate({
            'opacity': 0
        }, 750);

        $('.wrap img').removeClass();
    });

    $('.wrap img').on('click', function() {
        if($('.images-list img').length > 0){
            $('.images-list').children('img').remove();
        }
        var images = $('#inset-white .wrap').find('img').map(function(){
            return $(this).attr('src')
        }).get();
        $('#gallery-overlay').css('z-index', 1);
        $('#gallery-overlay').addClass('show_gallery_overlay');
        var src = $(this).attr('src');
        $('.gallery-main-img img').attr('src', src);
        $.each(images, function(index, value){
            if(value !== src){
                $('.images-list').append(document.createElement('img'));
                $('.images-list img').last().attr('src', value);
            }
        });

    });

    $('.close-btn').on('click', function(){
        $('#gallery-overlay').removeClass('show_gallery_overlay');
        setTimeout(function(){
            $('#gallery-overlay').css('z-index', -1);
        }, 1000);
    });

    $('#gallery-overlay .images-list').on('click', 'img', function(){
        var main_src = $('.gallery-main-img img').attr('src');
        $('.gallery-main-img img').attr('src', $(this).attr('src'));
        $(this).attr('src', main_src);
    });






});