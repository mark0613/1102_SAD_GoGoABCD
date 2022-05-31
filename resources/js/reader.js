$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function() {
    window.onscroll = function (){
        $("nav.fix-top").css("top", window.scrollY);
        $("footer.fix-bottom").css("bottom", -window.scrollY);
    }
})

window.changePage = function(dp) {
    let book = window.location.href.split("?")[0].split("/").splice(-1)[0];
    let page = parseInt(window.location.href.split("page=")[1]);
    let data = {
        "_token": $('meta[name="csrf-token"]').prop("content"),
        "book" : book,
        "page" : page + dp,
    }
    $.post(
        "/api/checkPageExists",
        data,
        (response, status) => {
            if (status == "success") {
                if (response["status"] == "success") {
                    if (response["data"]) {
                        window.location.href = `${window.location.href.split("?")[0]}?page=${page + dp}`;
                    }
                    else {
                        if (dp > 0) {
                            alert("這已經是最後一頁了");
                        }
                        else {
                            alert("這已經是第一頁了");
                        }
                    }
                }
            }
        }
    )
}

window.resizePage = function(ds) {
    let currentPageSize = $("#book").prop("width");
    let newPageSize = currentPageSize + 100 * ds;
    if (newPageSize < 100) {
        alert("無法再縮小了!");
        return;
    }
    if (newPageSize > 2000) {
        alert("無法再放大了!");
        return;
    }
    $("#book").prop("width", newPageSize);
}