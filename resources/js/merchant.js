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

    // show product preview
    $("#photo").change(function(){
        showPreview(this);
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
        $(".dropdown-toggle").attr('disabled', false);
        $(".class-book").css("display", "block");
        $(".class-music").css("display", "none");
    }
    else if (val.includes("music")) {
        if (!preVal.includes("music")) {
            refreshOptions()
        }
        $(".dropdown-toggle").attr('disabled', false);
        $(".class-book").css("display", "none");
        $(".class-music").css("display", "block");
    }
    else {
        $(".dropdown-toggle").attr('disabled', true);
        refreshOptions()
    }

    if (val.includes("e-")) {
        $("#file").css("display", "inline");
    }
    else {
        $("#file").css("display", "none");
    }
}

function showPreview(inputFile){
    if (inputFile.files && inputFile.files[0]){
        var reader = new FileReader();
        reader.onload = function(event){
            $("#preview").attr("src", event.target.result);
        }
        reader.readAsDataURL(inputFile.files[0]);
    }
    else{
        $("#preview").attr("src", "https://i.imgur.com/2s15CcP.png");
    }
}

window.hover = function(element) {
    let name = element.alt.split(" ")[0];
    element.setAttribute('src', `http://127.0.0.1:8000/image/${name}-hover.png`);
}
window.unhover = function(element) {
    let name = element.alt.split(" ")[0];
    element.setAttribute('src', `http://127.0.0.1:8000/image/${name}.png`);
}