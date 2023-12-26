var add_quantity_btn = document.querySelectorAll(".add_quantity_btn");
var main_quantity_add_div = document.querySelectorAll(".main_quantity_add_div");

for (var i = 0; i < add_quantity_btn.length; i++) {
    add_quantity_btn[i].addEventListener("click", function () {
        var j = i; // Capture the current value of i in a closure
        return function () {
            if (main_quantity_add_div[j].style.top == "-100%") {
                main_quantity_add_div[j].style.top = "10%";
            } else {
                main_quantity_add_div[j].style.top = "-100%";
            }
        };
    }());
}