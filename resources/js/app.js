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

    // show spinner when click submit
    $(".window button[type='submit']").on('click', function() {
        setTimeout(
            function() {
                $(".window button[type='submit'], .window button[id*='save']").html('<span class="spinner-border"></span>');
                $("button").attr("disabled", true);
            },
            1
        )
    })

    // change quantity
    $(".quantity").change(function() {
        quantityChange($(this).prop("id").split("-")[1], 0);
        calculateTotalCost();
    })

    // show record search type
    showSearchType()
    $("#record-search-type").change(function() {
        showSearchType()
    })
});


window.openWindow = function() {
    let pageHeight = Math.max($("body").outerHeight(), $("html").outerHeight());
    let nowPosition = document.documentElement.scrollTop;
    let windowPosition = nowPosition + 130;
    $('.cover').css("display", "block");
    $('.cover').outerHeight(pageHeight);
    $('.window').css("display", "block");
    $('.window').css("top", windowPosition);
    $("body").css("overflow-y", "hidden");
}
window.closeWindow = function() {
    $(".cover").css("display", "none");
    $(".window").css("display", "none");
    $("body").css("overflow-y", "auto");
}

window.quantityChange = function(id, dq) {
    let quantity = parseInt($(`#quantity-${id}`).val());
    let inventory = parseInt($(`#inventory-${id}`).text());
    let ans = quantity + dq;
    if (ans < 1) {
        alert("數量不能小於1!");
    }
    if (ans > inventory) { 
        alert("超過庫存量!");
    }
    ans = Math.max(ans, 1);
    ans = Math.min(ans, inventory);
    $(`#quantity-${id}`).val(ans);
}

function showSearchType() {
    let searchType = $("#record-search-type").val();
    if (searchType === undefined) {
        return ;
    }
    $(".search-type-radio").css("display", "none");
    $(`#search-${searchType}`).css("display", "block");
}

// record
window.searchRecord = function() {
    let data = {
        "_token": $('meta[name="csrf-token"]').prop("content"),
        "type" : $("#record-search-type").val(),
        "r_id" : $("#r_id").val(),
        "startDate" : $("#search-start-date").val(),
        "endDate" : $("#search-end-date").val(),
        "class" : $("#classes").val(),
    }
    $.post(
        "/api/searchRecord",
        data,
        (response, status) => {
            if (status == "success") {
                console.log(response);
                if (response["status"] == "success") {
                    let searchResult = $("#search-result");
                    searchResult.empty();
                    if (response["data"].length === 0) {
                        alert("尚無此條件下的訂單!");
                    }
                    for (let res of response["data"]) {
                        let record = res["record"];
                        let orders = res["order"];
                        if (record === null) {
                            continue;
                        }
                        searchResult.append(`
                        <tr>
                            <td scope="row">${record['r_id']}</td>
                            <td id="order-${record['r_id']}"></td>
                            <td>${record['usedPoint']}</td>
                            <td>$${record['cost']}</td>
                            <td>${record['time']}</td>
                        </tr>
                        `)
                        let tr = $(`#order-${record['r_id']}`);
                        tr.empty();
                        for (let order of orders) {
                            tr.append(`
                            <u>${order['p_name']}</u>(<i>$${order['price']}</i>) x <strong class="text-danger">${order['quantity']}</strong><br>
                            `);
                        }
                    }
                }
            }
        }
    )
}