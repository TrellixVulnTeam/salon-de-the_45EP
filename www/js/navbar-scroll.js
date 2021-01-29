$(window).scroll(function () {
    if ($(document).scrollTop() > 50) {
        $('.fixed-navbar').addClass('color-change');
    } else {
        $('.fixed-navbar').removeClass('color-change');
    }
});