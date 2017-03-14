$(document).ready(function () {

    $("#content").load("js/view/search.php", function () {
        $("input.validate").focus();
    });

    $(document).on("focusout", "div.col-md-4 input.validate", function () {
        var email = $(this).val();
        var callback = function (format_valid, smtp_check, score) {
            if ($("input.validate").parent().hasClass("has-success"))
                $("input.validate").parent().removeClass("has-success");
            if ($("input.validate").parent().hasClass("has-danger"))
                $("input.validate").parent().removeClass("has-danger");

            if (format_valid && smtp_check)
                $("input.validate").parent().addClass("has-success");
            else
                $("input.validate").parent().addClass("has-danger");

            $("input[type=hidden]").val(score);
        };
        validate.email(email, callback);
    });

    $(document).on("focusin", "div.col-md-4 input", function () {
        if ($("input").parent().hasClass("has-success"))
            $("input").parent().removeClass("has-success");
        if ($("input").parent().hasClass("has-danger"))
            $("input").parent().removeClass("has-danger");
    });

    $(document).on("click", "div input[type=button]", function () {
        var callback = function (response) {
            console.log(response);
            if (response.status == "OK") {
                $("input#address").parent().addClass("has-success");
                $("#content").load("js/view/resultSearch.php", function () {
                     $("div.score span").html(response.score);
                     $("span.number-address").html(response.address.number);
                });
            } else {
                if ($("input#address").parent().hasClass("has-success"))
                    $("input#address").parent().removeClass("has-success");
                if ($("input#address").parent().hasClass("has-danger"))
                    $("input#address").parent().removeClass("has-danger");

                if (response.numbererror == "103")
                    $("input#address").parent().addClass("has-danger");
                //else
                //$("input.validate").parent().addClass("has-danger");
            }
        };
        var email = $("input#email").val();
        var address = $("input#address").val();
        var score = $("input#score").val();
        search.submit(email, address, score, callback);
    });
});


