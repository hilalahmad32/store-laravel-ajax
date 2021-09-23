$(document).ready(function () {
    $("#login").on("submit", function (e) {
        e.preventDefault();
        $("#login-users").text("connecting....");
        const email = $("#email").val();
        const password = $("#password").val();

        const formdata = new FormData(this);
        if (email == "" || password == "") {
            $("#login-users").text("login");
            show_message("error", "All Field Is required");
        } else {
            $("#login-users").text("connecting....");
            $.ajax({
                url: "/login",
                type: "POST",
                data: formdata,
                contentType: false,
                processData: false,
                success: (data) => {
                    if (data == 1) {
                        show_message("success", "Login Successfully");
                        $("#login-users").text("login");
                        // setTimeout(() => {
                            window.location.href = "/order";
                        // }, 1000);
                    } else {
                        show_message("error", "Something Woring");
                        $("#login-users").text("login");

                    }
                }
            })
        }
    });


    $("#add-order").on("submit", function (e) {
        e.preventDefault();
        const fname = $("#fname").val();
        const lname = $("#lname").val();
        const email = $("#email").val();
        const location = $("#location").val();
        const model = $("#model").val();
        const brand = $("#brand").val();
        const phone = $("#phone").val();
        const part = $("#part").val();
        const message=$("#message").val();

        const formdata = new FormData(this);
        if (fname == "" || lname == "" || email == "" || location == "" || model == "" || brand == "" || phone == "" || part == "" || message  == "") {
            show_message("error", "Please Fill all The Field");
        } else {
            $("#customar-save").text("Saveing....")
            $.ajax({
                url: '/add-order',
                type: "POST",
                data: formdata,
                contentType: false,
                processData: false,
                success: (data) => {
                    if (data == 1) {
                        $("#customar-save").text("save");
                        show_message("success", "Order Add Successfully");
                        $("#add-order").trigger("reset");
                    } else {
                        show_message("error", "Something Woring");
                    }
                }

            })

        }
    });

    const Order = () => {
        $("#loading-data").text("loading...")
        $.ajax({
            url: "/orders",
            type: "GET",
            success: (data) => {
                $("#order").html(data);
                $("#loading-data").text("")

            }
        });
    }
    Order();
    const show_message = (type, text) => {
        if (type == "error") {
            var message_box = $("#error-message");
        } else {
            var message_box = $("#success-message");
        }

        message_box.css({ display: "block" });
        message_box.text(text);
        setTimeout(() => {
            message_box.css({ display: "none" })
        }, 2000);
    }
})