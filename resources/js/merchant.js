$(document).ready(function() {
    // product type select;
    changeProductClass();
    $("#p_type").change(function(){
        changeProductClass();
    })

    // show record search type
    showSearchType()
    $("#record-search-type").change(function() {
        showSearchType()
    })
});

function showSearchType() {
    let searchType = $("#record-search-type").val();
    if (searchType === undefined) {
        return ;
    }
    $(".search-type-radio").css("display", "none");
    $(`#search-${searchType}`).css("display", "block");
}

function refreshOptions() {
    $("#classes").val('none');
    $("#classes").selectpicker("refresh");
}
function changeProductClass() {
    let val = $("#p_type").val();
    let preVal = $("#pre_p_type").val();
    if (val===undefined || preVal===undefined) {
        return ;
    }
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
