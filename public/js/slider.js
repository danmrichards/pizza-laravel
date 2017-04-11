$(document).ready(function(){
    $('#slider>img').first().addClass('visible');

    var images = $('#slider > img');

    $('#right-arrow').on('click', function(){ next(images); });

    $('#left-arrow').on('click', function(){ previous(images); });

    var intervalId = null;
    intervalId = setInterval(function(){
        next(images);
    }, 3500);
    $('#slider').on('mouseenter', function(){
        clearInterval(intervalId);
    });
    $('#slider').on('mouseleave', function(){
        intervalId = setInterval(function(){
            next(images);
        }, 3500);
    });
});

function next(images){
    var current = $('img.visible').removeClass();
    var index = images.index(current);
    if(images.length === index+1){
        images.first().addClass('visible');
    }else{
        current.next().addClass('visible');
    }
}

function previous(images){
    var current = $('img.visible').removeClass();
    var index = images.index(current);
    if(index === 0){
        images.last().addClass('visible');
    }else{
        current.prev().addClass('visible');
    }
}