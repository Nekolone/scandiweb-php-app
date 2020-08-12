function run() {
    var e = document.getElementById("item__type");
    var n = e.options[e.selectedIndex].value;

    switch (n) {
        case "0":
            $('.size').css("display", "block");
            $('.HWL').css("display", "none");
            $('.weight').css("display", "none");
            break;
        case "1":
            $('.size').css("display", "none");
            $('.HWL').css("display", "block");
            $('.weight').css("display", "none");
            break;
        case "2":
            $('.size').css("display", "none");
            $('.HWL').css("display", "none");
            $('.weight').css("display", "block");
            break;
    }
}

function run_img(n) {
    document.getElementById("ins_img").innerHTML = "<img src=\""+n+"\" alt=\"PIC\">";
}
