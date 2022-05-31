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

    // show spinner when click submit
    $(".window button[type='submit']").on('click', function() {
        setTimeout(
            function() {
                $(".window button[type='submit']").html('<span class="spinner-border"></span>');
                $("button").attr("disabled", true);
            },
            1
        )
    })
});


function openWindow() {
    let pageHeight = Math.max($("body").outerHeight(), $("html").outerHeight());
    let nowPosition = document.documentElement.scrollTop;
    let windowPosition = nowPosition + 130;
    $('.cover').css("display", "block");
    $('.cover').outerHeight(pageHeight);
    $('.window').css("display", "block");
    $('.window').css("top", windowPosition);
    $("body").css("overflow-y", "hidden");
}
function closeWindow() {
    $(".cover").css("display", "none");
    $(".window").css("display", "none");
    $("body").css("overflow-y", "auto");
}

window.quantityChange = function(id, dq) {
    let quantity = parseInt($(`#quantity-${id}`).val());
    let ans = quantity + dq;
    ans = ans > 0 ? ans : 1;
    $(`#quantity-${id}`).val(ans);
}
