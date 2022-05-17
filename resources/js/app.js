require('./bootstrap');

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$( document ).ready(function() {
    // date picker
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
    });

    // multi-selector
    $('.multi-select').selectpicker();

    // open window when click button
    $(".open-window").on('click', function() {
        openWindow();
    })

    // close window when click button or cover
    $(".close-window, .cover").on('click', function() {
        closeWindow();
    })
});


function openWindow() {
    $('.cover').css("display", "block");
    $('.window').css("display", "block");
}
function closeWindow() {
    $(".cover").css("display", "none");
    $(".window").css("display", "none");
}

window.quantityChange = function(id, dq) {
    let quantity = parseInt($(`#quantity-${id}`).val());
    let ans = quantity + dq;
    ans = ans > 0 ? ans : 1;
    $(`#quantity-${id}`).val(ans);
}
