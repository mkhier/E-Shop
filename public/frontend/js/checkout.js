$(document).ready(function () {
    $('.razorpay-btn').click(function (e) {
        e.preventDefault();
        



        $.ajax({
            method: "POST",
            url: "/proceed-to-pay",
            data: "data",
            dataType: "dataType",
            success: function (response) {
                
            }
        });
    });
});
