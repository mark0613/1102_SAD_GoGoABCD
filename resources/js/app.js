require('./bootstrap');

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

    // product type select;
    changeProductClass();
    $("#p_type").change(function(){
        changeProductClass();
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

function refreshOptions() {
    $("#classes").val('none');
    $("#classes").selectpicker("refresh");
}

function changeProductClass() {
    let val = $("#p_type").val();
    let preVal = $("#pre_p_type").val();
    if (val.includes("book")) {
        if (!preVal.includes("book")) {
            refreshOptions()
        }
        $(".dropdown-toggle").prop('disabled', false);
        $(".class-book").css("display", "block");
        $(".class-music").css("display", "none");
    }
    else if (val.includes("music")) {
        if (!preVal.includes("music")) {
            refreshOptions()
        }
        $(".dropdown-toggle").prop('disabled', false);
        $(".class-book").css("display", "none");
        $(".class-music").css("display", "block");
    }
    else {
        $(".dropdown-toggle").prop('disabled', true);
        refreshOptions()
    }
}