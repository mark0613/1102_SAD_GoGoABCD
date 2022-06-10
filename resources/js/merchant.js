const COLOR = {
    "e-book" : "red",
    "r-book" : "rgb(0, 235, 0)",
    "e-music" : "rgb(0, 127, 255)",
    "r-music" : "pink",
};
const LABELS = {
    "e-book" : "電子書籍",
    "r-book" : "實體書籍",
    "e-music" : "數位音樂",
    "r-music" : "實體唱片",
};

var chart = null;

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

    // delete something when click image of "delete"
    $('img[id*="delete"]').each(function() {
        let id = $(this).prop("id").split("-")[1];
        $(this).on('click', function() {
            if (confirm("確認移除嗎? 將不可復原!")) {
                let type = window.location.href.split("/").splice(-1)[0];
                if (type == "staff" || type =="admin") {
                    deleteStaff(id);
                }
                if (type == "product") {
                    deleteProduct(id)
                }
            }
        })
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

function deleteStaff(u_id) {
    let data = {
        "_token": $('meta[name="csrf-token"]').prop("content"),
        'u_id' : u_id,
    };
    $.post(
        "/api/deleteStaff",
        data,
        (response, status) => {
            if (status == "success") {
                if (response["status"] == "success") {
                    alert("移除成功!")
                    window.location.reload();
                }
            }
        }
    )
}
function deleteProduct(p_id) {
    let data = {
        "_token": $('meta[name="csrf-token"]').prop("content"),
        'p_id' : p_id,
    };
    $.post(
        "/api/deleteProduct",
        data,
        (response, status) => {
            if (status == "success") {
                console.log(response);
                if (response["status"] == "success") {
                    alert("移除成功!")
                    window.location.reload();
                }
            }
        }
    )
}


window.hover = function(element) {
    let name = element.alt.split(" ")[0];
    element.setAttribute('src', `http://127.0.0.1:8000/image/${name}-hover.png`);
}
window.unhover = function(element) {
    let name = element.alt.split(" ")[0];
    element.setAttribute('src', `http://127.0.0.1:8000/image/${name}.png`);
}

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
                if (response["status"] == "success") {
                    console.log(response["data"]);
                    let searchResult = $("#search-result");
                    searchResult.empty();
                    for (let res of response["data"]) {
                        let record = res["record"];
                        let orders = res["order"];
                        if (record === null) {
                            alert("尚無此條件下的訂單!");
                            break;
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

window.deleteAdvertisement = function() {
    if (!confirm("確認移除嗎? 將不可復原!")) {
        return;
    }
    let a_id = $('div[id*="a_id-"][class*="active"]').prop("id").split("-")[1];
    let data = {
        "_token": $('meta[name="csrf-token"]').prop("content"),
        'a_id' : a_id,
    };
    $.post(
        "/api/deleteAdvertisement",
        data,
        (response, status) => {
            if (status == "success") {
                if (response["status"] == "success") {
                    alert("移除成功!")
                    window.location.reload();
                }
            }
        }
    )
}

function barChart(ctx, labels, data) {
    let datasets = [];
    let i = 0;
    for (let key in data) {
        datasets.push(
            {
                label : LABELS[key],
                data : data[key],
                backgroundColor : COLOR[key],
                borderWidth: 1,
                skipNull : false,
                responsive: true,
            }
        )
        i++;
    }
    return new Chart(ctx, {
        type : "bar",
        data : {
            labels : labels,
            datasets : datasets
        }
    });
}

function pieChart(ctx, labels, data) {
    let pieLabels = [];
    let pieData = [];
    let pieColor = [];
    for (let key in data) {
        let sum = data[key].reduce((tmp, a) => tmp + a, 0);
        pieLabels.push(LABELS[key]);
        pieData.push(sum);
        pieColor.push(COLOR[key]);
    }
    return new Chart(ctx, {
        type : 'pie',
        data : {
        labels : pieLabels,
        datasets : [
            {
                data : pieData,
                backgroundColor : pieColor,
                responsive: true,
            }
        ],
        }
    });
}
window.generateChart = function() {
    let ctx = document.getElementById("canvas-chart");
    let chartType = $("#chartType").val();
    let data = {
        "_token": $('meta[name="csrf-token"]').prop("content"),
        "startDate" : $("#startDate").val(),
        "endDate" : $("#endDate").val(),
        "productType" : $("#productType").val(),
    }
    $.post(
        "/api/getChartData",
        data,
        (response, status) => {
            if (status == "success") {
                if (response["status"] == "success") {
                    let data = response["data"];
                    if (chart) {
                        chart.destroy();
                    }
                    if (chartType == "bar") {
                        chart = barChart(ctx, data["labels"], data["datasets"]);
                        ctx.classList.remove("pie");
                    }
                    else {
                        chart = pieChart(ctx, data["labels"], data["datasets"]);
                        ctx.classList.remove("bar");
                    }
                    ctx.classList.add(chartType)
                }
            }
        }
    )
    
}