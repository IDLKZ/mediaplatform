$(document).ready(function () {
    var cw = $('.circle').width();
    $('.circle').css({'height':cw+'px'});

    //Start Hover effect

    $(".skill-blocks").hover(function(){
        clr = $(this).css('background-color');
        $(this).css("background-color", jQuery.Color( this, "backgroundColor" ).saturation(200));
        $(this).css("color", "white");
        $(this).find('small').css("color", "white");
        $(this).find('.circle').css('background-color', 'black')
    }, function(){
        // var clr = $(this).css('background-color');
        $(this).css("background-color", clr);
        $(this).css("color", "black");
        $(this).find('small').css("color", "black");
        $(this).find('.circle').css('background-color', 'white')
    });
    //End Hover effect
});