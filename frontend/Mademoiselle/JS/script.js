$(document).ready(function () {

    var navHeight = $('.head-nav-list').height();

    if ($(window).width() <= 768) {
        var inputWidth = 100;
    } else  {
        var inputWidth = 200;
    }

    if ($(window).width() >= 992) {
        var navWidth = $('.head-nav-list').width();
        $('.head-nav-icons').css('right', navWidth+'px');
    }

    if ($(window).width() <= 992) {
        $('.head-nav-list').height(0);
    } 

    $('.head-nav-icons input').width(0);
    
    $('.ham-menu').click(function () {
        if($('.head-nav-list').height() == 0) {
            $('.head-nav-list').css('height', navHeight+'px');
            
        } else {
            $('.head-nav-list').css('height', 0+'px'); 
        }
    });

    $('.fa-search ').click(function () {
        if ($('.head-nav-icons input').width() == 0) {
            $('.head-nav-icons input').css('width', inputWidth+'px');
        } else {
            $('.head-nav-icons input').css('width', '0px');
        }
    });


});