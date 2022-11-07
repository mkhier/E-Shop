$(document).ready(function () {
    loadCart();
    loadWishlist();

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    function loadCart() {
        $.ajax({
            type: "GET",
            url: "/load-cart-data",
            success: function (response) {
                $(".cart-count").html("");
                $(".cart-count").html(response.count);
            }
        });
    }

    function loadWishlist() {
        $.ajax({
            type: "GET",
            url: "/load-wishlist-count",
            success: function (response) {
                $(".wishlist-count").html("");
                $(".wishlist-count").html(response.count);
            }
        });
    }

    $(".addToCartBtn").click(function (e) {
        e.preventDefault();
        var product_id = $(this)
            .closest(".product_data")
            .find(".prod_id")
            .val();
        var product_qty = $(this)
            .closest(".product_data")
            .find(".qty-input")
            .val();
        $.ajax({
            type: "POST",
            url: "/add-to-cart",
            data: {
                product_id: product_id,
                product_quantity: product_qty,
            },
            success: function (response) {
                alert(response.status);
            },
        });
    });

    $(".addToWishlist").click(function (e) {
        e.preventDefault();
        var product_id = $(this)
            .closest(".product_data")
            .find(".prod_id")
            .val();
        $.ajax({
            type: "POST",
            url: "/add-to-wishlist",
            data: {
                product_id: product_id,
            },
            success: function (response) {
                alert(response.status);
                loadWishlist();
            },
        });
    });

    $(".increment-btn").click(function (e) {
        e.preventDefault();
        var inc_value = $(this)
            .closest(".product_data")
            .find(".qty-input")
            .val();
        var value = parseInt(inc_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value < 10) {
            value++;
            $(this).closest(".product_data").find(".qty-input").val(value);
        }
    });

    $(".decrement-btn").click(function (e) {
        e.preventDefault();
        var dec_value = $(this)
            .closest(".product_data")
            .find(".qty-input")
            .val();
        var value = parseInt(dec_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value > 1) {
            value--;
            $(this).closest(".product_data").find(".qty-input").val(value);
        }
    });
    $(".delete-cart-item").click(function (e) {
        e.preventDefault();
        var prod_id = $(this).closest(".product_data").find(".prod_id").val();

        $.ajax({
            type: "POST",
            url: "/delete-cart-item",
            data: {
                product_id: prod_id,
            },
            success: function (response) {
                location.reload();
                alert(response.status);
            },
        });
    });

    $(".removeWishlist").click(function (e) {
        e.preventDefault();
        var product_id = $(this)
            .closest(".product_data")
            .find(".prod_id")
            .val();
        $.ajax({
            type: "POST",
            url: "/delete-wishlist-item",
            data: {
                product_id: product_id,
            },
            success: function (response) {
                location.reload();
                alert(response.status);
            },
        });
    });

    $(".changeQuantity").click(function (e) {
        e.preventDefault();
        var prod_id = $(this).closest(".product_data").find(".prod_id").val();
        var qty = $(this).closest(".product_data").find(".qty-input").val();

        $.ajax({
            type: "POST",
            url: "/update-cart",
            data: {
                product_id: prod_id,
                product_quantity: qty,
            },
            success: function (response) {
                location.reload();
            },
        });
    });
});
