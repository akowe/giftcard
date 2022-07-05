/*!
    * Start Bootstrap - SB Admin v6.0.1 (https://startbootstrap.com/templates/sb-admin)
    * Copyright 2013-2020 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
    */
    (function($) {
    "use strict";

    // Add active state to sidbar nav links
    var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
        $("#layoutSidenav_nav .sb-sidenav a.nav-link").each(function() {
            if (this.href === path) {
                $(this).addClass("active");
            }
        });

    // Toggle the side navigation
    $("#sidebarToggle").on("click", function(e) {
        e.preventDefault();
        $("body").toggleClass("sb-sidenav-toggled");
    });
})(jQuery);


// Google $100 Trade Price
    function google100() {

    var amount = document.getElementById("d_amount_100")  .value;
    var quantity = document.getElementById("d_quantity_100").value;

    var price = document.getElementById('d_price_100');

    var g_result_100 = amount * quantity;
    document.getElementById('d_price_100').value = g_result_100;
}

// Google $50 Trade Price
function google50() {

    var amount = document.getElementById("d_amount_50").value;
    var quantity = document.getElementById("d_quantity_50").value;

    var price = document.getElementById('d_price_50');

    var g_result_50 = amount * quantity;
    document.getElementById('d_price_50').value = g_result_50;
}

// Google $25 Trade Price
function google25() {

    var amount = document.getElementById("d_amount_25").value;
    var quantity = document.getElementById("d_quantity_25").value;

    var price = document.getElementById('d_price_25');

    var g_result_25 = amount * quantity;
    document.getElementById('d_price_25').value = g_result_25;
}

//Total Price


//POUNDS TRADE PRICES

// 100 pounds Trade Price
function pounds100() {

    var amount1 = document.getElementById("p_amount_100")  .value;
    var quantity1 = document.getElementById("p_quantity_100").value;

    var price = document.getElementById('p_price_100');

    var g_result_100 = amount1 * quantity1;
    document.getElementById('p_price_100').value = g_result_100;
}

// pounds 50 Trade Price
function pounds50() {

    var amount1 = document.getElementById("p_amount_50").value;
    var quantity1 = document.getElementById("p_quantity_50").value;

    var price = document.getElementById('p_price_50');

    var g_result_50 = amount1 * quantity1;
    document.getElementById('p_price_50').value = g_result_50;
}

// pounds 25 Trade Price
function pounds25() {

    var amount1 = document.getElementById("p_amount_25").value;
    var quantity1 = document.getElementById("p_quantity_25").value;

    var price = document.getElementById('p_price_25');

    var g_result_25 = amount1 * quantity1;
    document.getElementById('p_price_25').value = g_result_25;
}

//Total Price



//EURO TRADE PRICES

// 100 pounds Trade Price
function euro100() {

    var amount2 = document.getElementById("e_amount_100")  .value;
    var quantity2 = document.getElementById("e_quantity_100").value;

    var price = document.getElementById('e_price_100');

    var result_100 = amount2 * quantity2;
    document.getElementById('e_price_100').value = result_100;
}

// pounds 50 Trade Price
function euro50() {

    var amount2 = document.getElementById("e_amount_50").value;
    var quantity2 = document.getElementById("e_quantity_50").value;

    var price = document.getElementById('e_price_50');

    var result2_50 = amount2 * quantity2;
    document.getElementById('e_price_50').value = result2_50;
}

// pounds 25 Trade Price
function euro25() {

    var amount2 = document.getElementById("e_amount_25").value;
    var quantity2 = document.getElementById("e_quantity_25").value;

    var price = document.getElementById('e_price_25');

    var result_25 = amount2 * quantity2;
    document.getElementById('e_price_25').value = result_25;
}




