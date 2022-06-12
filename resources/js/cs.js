$(document).ready(function() {
    // show message
    let isCS = window.location.href.includes("admin");
    setInterval(
        function() {
            if (isCS) {
                showCustomerServiceMessageOnCS()
            }
            else {
                showCustomerServiceMessageOnCustomer();
            }
        }, 300
    )
})

function showCustomerServiceMessageOnCustomer() {
    let data = {
        "_token": $('meta[name="csrf-token"]').prop("content"),
        "m_id" : 10,
    };
    $.post(
        "/api/getCustomerServiceMessageOnCustomer",
        data,
        (response, status) => {
            if (status == "success") {
                if (response["status"] == "success") {
                    let msgs = response["data"];
                    $("#cs-msg-customer").empty();
                    for (let msg of msgs) {
                        $("#cs-msg-customer").append(`
                            <label>${msg["from"]} : ${msg["message"]}</label>
                            <br>
                        `)
                    }
                }
            }
        }
    )
}
function showCustomerServiceMessageOnCS() {
    let data = {
        "_token": $('meta[name="csrf-token"]').prop("content"),
        "c_id" : window.location.href.split("?c_id=")[1],
    };
    $.post(
        "/api/getCustomerServiceMessageOnCS",
        data,
        (response, status) => {
            if (status == "success") {
                console.log(response);
                if (response["status"] == "success") {
                    let msgs = response["data"];
                    $("#cs-msg-cs").empty();
                    for (let msg of msgs) {
                        $("#cs-msg-cs").append(`
                            <label>${msg["from"]} : ${msg["message"]}</label>
                            <br>
                        `)
                    }
                }
            }
        }
    )
}

window.sendMessageOnCustomer = function() {
    let data = {
        "_token": $('meta[name="csrf-token"]').prop("content"),
        "m_id" : 10,
        "msg" : $("#cs-msg").val(),
    };
    $.post(
        "/api/sendMessageOnCustomer",
        data,
        (response, status) => {
            if (status == "success") {
                console.log(response);
                if (response["status"] == "success") {
                    showCustomerServiceMessageOnCustomer();
                    $("#cs-msg").val("");
                    $("#btn-submit-msg").attr("disabled", false);
                    $("#btn-submit-msg").html("傳送");
                }
            }
        }
    )
}
window.sendMessageOnCS = function() {
    let data = {
        "_token": $('meta[name="csrf-token"]').prop("content"),
        "c_id" : window.location.href.split("?c_id=")[1],
        "msg" : $("#cs-msg").val(),
    };
    $.post(
        "/api/sendMessageOnCS",
        data,
        (response, status) => {
            if (status == "success") {
                console.log(response);
                if (response["status"] == "success") {
                    showCustomerServiceMessageOnCS();
                    $("#cs-msg").val("");
                    $("#btn-submit-msg").attr("disabled", false);
                    $("#btn-submit-msg").html("傳送");
                }
            }
        }
    )
}