$(function(){

    $('.miniature > img').on('click', function(){
        var new_src = $(this).attr('src');
        $('.main>img').attr('src', new_src);
    });

    $('.main').on('mouseover', function(){
        $('.overlay_small').addClass('show');
    });

    $('.main').on('mouseleave', function(){
        $('.overlay_small').removeClass('show');
    });

    $('.main').on('click', function(){
        $('#overlay').addClass('show_overlay');
    });

    $('.images_list > img').on('click', function(){
        var new_src = $(this).attr('src');
        $('.gallery_main_image>img').attr('src', new_src);
    });

    $('.close_button').on('click', function(){
        $('#overlay').removeClass('show_overlay');
    });
});