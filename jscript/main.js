$(document).ready(function(){
    resize();
    modal();

});

window.onresize = function(event) {
    resize();
}



function resize(){
    $('#login-form').css({
        'padding-bottom': 0,
        'left': 0
    });
    mmh = $('#main-menu').outerHeight();
    cw = $('#cart').outerWidth();
    w = $(window).width();
    h = $(window).height();
    $('#menu-prod, #cart').css({
        'top': mmh + 'px'
    });
    $('#menu-prod').css({
        'width': (w - cw) + 'px'
    });
    lfh = $('#login-form').outerHeight();
    lfw = $('#login-form').outerWidth();
    $('#login-form').css({
        'padding-bottom': (h - lfh) / 2 + 'px',
        'left': (w - lfw) / 2 + 'px'
    });
}

    function modal(){

    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    }

