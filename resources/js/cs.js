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
                        let isMine =  msg["from"]==msg["c_id"];
                        let align = isMine ? "float-right" : "float-left";
                        let color = isMine ? "msg-is-mine" : "msg-default"
                        $("#cs-msg-customer").append(`
                            <div class="row">
                                <div class="col-12">
                                    <label class="${align} msg ${color} text-break">${msg["message"]}</label>
                                    <label class="${align} small">${msg["time"].split(" ")[1].split(":").splice(0, 2).join(":")}</label>
                                </div>
                            </div>
                        `)
                    }
                    document.getElementById("cs-msg-customer").scroll(0, 999)
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
                if (response["status"] == "success") {
                    let msgs = response["data"];
                    $("#cs-msg-cs").empty();
                    for (let msg of msgs) {
                        let isMine =  msg["from"]==msg["m_id"];
                        let align = isMine ? "float-right" : "float-left";
                        let color = isMine ? "msg-is-mine" : "msg-default"
                        $("#cs-msg-cs").append(`
                            <div class="row">
                                <div class="col-12">
                                    <label class="${align} msg ${color} text-break">${msg["message"]}</label>
                                    <label class="${align} small">${msg["time"].split(" ")[1].split(":").splice(0, 2).join(":")}</label>
                                </div>
                            </div>
                        `)
                    }
                    document.getElementById("cs-msg-cs").scroll(0, 999)
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