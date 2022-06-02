$(document).ready(function() {
    calculateTotalCost();
})

window.addProductToCart = function(p_id) {
    let q = $(`#quantity-${p_id}`).val();
    let data = {
        "_token": $('meta[name="csrf-token"]').prop("content"),
        "p_id" : p_id,
        "quantity" : q,
    };
    $.post(
        "/api/addProductToCart",
        data,
        (response, status) => {
            if (status == "success") {
                if (response["status"] == "success") {
                    alert("新增成功!");
                    window.location.reload();
                }
            }
        }
    )
}

window.removeProductFromCart = function() {
    let p_id = [];
    $('input[name="remove[]"]:checkbox:checked').each(function(i) {
        p_id[i] = $(this).val();
    });
    let data = {
        "_token": $('meta[name="csrf-token"]').prop("content"),
        "p_id" : p_id,
    };
    $.post(
        "/api/removeProductFromCart",
        data,
        (response, status) => {
            if (status == "success") {
                if (response["status"] == "success") {
                    alert("移除成功!");
                    window.location.reload();
                }
            }
        }
    )
}

window.updateQuantity = function(p_id) {
    let q = $(`#quantity-${p_id}`).val();
    let data = {
        "_token": $('meta[name="csrf-token"]').prop("content"),
        "p_id" : p_id,
        "quantity" : q,
    };
    $.post(
        "/api/updateQuantity",
        data,
        (response, status) => {
            if (status == "success") {
                if (response["status"] == "success") {
                    calculateTotalCost();
                }
            }
        }
    )
}

window.calculateTotalCost = function() {
    let p_id = [];
    $('.quantity').each(function(i) {
        p_id[i] = $(this).prop("id").split("-")[1];
    });
    let totalCost = 0;
    for (let id of p_id) {
        let price = parseInt($(`#price-${id}`).text());
        let quantity = parseInt($(`#quantity-${id}`).val())
        totalCost += (price * quantity);
    }
    $(".total-cost").text(totalCost);
}

window.addProductToWishlist = function(p_id, fast=true) {
    let data = {
        "_token": $('meta[name="csrf-token"]').prop("content"),
        'p_id' : p_id,
    };
    $.post(
        "/api/addProductToWishlist",
        data,
        (response, status) => {
            if (status == "success") {
                if (response["status"] == "success") {
                    if (fast) {
                        $(`#wish-${p_id}`).addClass("btn-danger");
                        $(`#wish-${p_id}`).removeClass("btn-light");
                        $(`#wish-${p_id}`).attr("onclick", `removeProductFromWishlist(${p_id})`);
                    }
                    else {
                        alert("新增成功");
                        window.location.reload();
                    }
                }
            }
        }
    )
}

window.removeProductFromWishlist = function(p_id, fast=true) {
    let data = {
        "_token": $('meta[name="csrf-token"]').prop("content"),
        'p_id' : p_id,
    };
    $.post(
        "/api/removeProductFromWishlist",
        data,
        (response, status) => {
            if (status == "success") {
                if (response["status"] == "success") {
                    if (fast) {
                        $(`#wish-${p_id}`).addClass("btn-light");
                        $(`#wish-${p_id}`).removeClass("btn-danger");
                        $(`#wish-${p_id}`).attr("onclick", `addProductToWishlist(${p_id})`);
                    }
                    else {
                        alert("移除成功");
                        window.location.reload();
                    }
                }
            }
        }
    )
}

window.submitOrder = function() {
    let order = {};
    $(".quantity").each(function(){
        let p_id = $(this).prop("id").split("-")[1];
        let q = $(this).val();
        order[p_id] = q;
    })
    let points = $("#point").val();
    let data = {
        "_token": $('meta[name="csrf-token"]').prop("content"),
        'order' : order,
        'points' : points,
    };
    $.post(
        "/api/pay",
        data,
        (response, status) => {
            if (status == "success") {
                if (response["status"] == "success") {
                    alert("付款成功");
                    window.location.reload();
                }
            }
        }
    )
}