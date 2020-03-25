$(window).scroll(function (event) {
    var scroll = $(window).scrollTop();
    if (scroll > 65) {
        $(".navigation").addClass('fixed-top') 
    } else {
        $(".navigation").removeClass('fixed-top');
    }
});