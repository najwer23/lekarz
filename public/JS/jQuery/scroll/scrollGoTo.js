$(document).ready(function (){
    $("#click").click(function (){
        $('html, body').animate({
            scrollTop: $("#start").offset().top
        }, 1000);
    });
});
