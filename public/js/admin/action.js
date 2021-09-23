$(document).ready(function () {

    $("#admin-login").on("submit", function (e) {
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
                url: "/admin/login",
                type: "POST",
                data: formdata,
                contentType: false,
                processData: false,
                success: (data) => {
                    console.log(data);
                    if (data == 1) {
                        show_message("success", "Login Successfully");
                        $("#login-users").text("login");
                        // setTimeout(() => {
                        window.location.href = "/admin/customers";
                        // }, 1000);
                    } else {
                        show_message("error", "Something Woring");
                        $("#login-users").text("login");

                    }
                }
            })
        }
    })


    const loadCustomers = () => {
        $("#loading-data").text("loading...")
        $.ajax({
            url: "/admin/get-customers",
            type: "GET",
            success: (data) => {
                $("#customer-data").html(data);
                $("#loading-data").text("")

            }
        });
    }

    loadCustomers();

    const listOfOrder = () => {
        $("#loading-data").text("loading...")
        $.ajax({
            url: "/admin/list-of-order",
            type: "GET",
            success: (data) => {
                $("#list-data").html(data);
                $("#loading-data").text("")

            }
        });
    }
    listOfOrder();

    $("#search").keyup(function () {
        const search = $(this).val();
        $.ajax({
            url: "/admin/list-of-search",
            type: "GET",
            data: { search: search },
            success: function (data) {
                $("#list-data").html(data);
            }
        });
    })
    $("#add-customer").on("submit", function (e) {
        e.preventDefault();
        const fname = $("#fname").val();
        const lname = $("#lname").val();
        const email = $("#email").val();
        const location = $("#location").val();
        const model = $("#model").val();
        const brand = $("#brand").val();
        const phone = $("#phone").val();
        const part = $("#part").val();
        const password = $("#password").val();

        const formdata = new FormData(this);
        if (fname == "" || lname == "" || email == "" || location == "" || model == "" || brand == "" || phone == "" || part == "" || password == "") {
            show_message("error", "Please Fill all The Field");
        } else {
            $("#customar-save").text("Saveing....")
            $.ajax({
                url: '/admin/create-customar',
                type: "POST",
                data: formdata,
                contentType: false,
                processData: false,
                success: (data) => {
                    if (data == 1) {
                        $("#customar-save").text("save");
                        show_message("success", "Customar Add Successfully");
                        loadCustomers();
                        $("#add-customer").trigger("reset");
                        $("#customar").modal("hide");
                    } else if (data == 2) {
                        show_message("error", "Email all ready exist");
                        $("#customar-save").text("save");
                    } else {
                        show_message("error", "Something Woring");
                    }
                }

            })

        }
    });


    $(document).on("click", "#editcustomer", function () {
        const id = $(this).data("id");
        $("#loading").text("loading....");
        $.ajax({
            url: "/admin/edit-customers",
            type: "GET",
            data: { id: id },
            success: (data) => {
                // console.log(data)
                $("#edit-customer").html(data);
                $("#loading").text("");

            }
        });
    });



    $("#update-customer").on("submit", function (e) {
        e.preventDefault();
        const fname = $("#edit_fname").val();
        const lname = $("#edit_lname").val();
        const email = $("#edit_email").val();
        const location = $("#edit_location").val();
        const model = $("#edit_model").val();
        const brand = $("#edit_brand").val();
        const phone = $("#edit_phone").val();
        const part = $("#edit_part").val();

        const formdata = new FormData(this);
        if (fname == "" || lname == "" || email == "" || location == "" || model == "" || brand == "" || phone == "" || part == "" || password == "") {
            show_message("error", "Please Fill all The Field");
        } else {
            $("#customar-update").text("Updating....")
            $.ajax({
                url: '/admin/update-customer',
                type: "POST",
                data: formdata,
                contentType: false,
                processData: false,
                success: (data) => {
                    if (data == 1) {
                        show_message("success", "Customar Udpate Successfully");
                        loadCustomers();
                        $("#customar-update").text("Update");
                        $("#udpate-customer").trigger("reset");
                        $("#updateCustomar").modal("hide");
                    } else {
                        show_message("error", "Something Woring");
                    }
                }

            })

        }
    });

    $(document).on("click", "#delete-customer", function () {
        const id = $(this).data("id");
        $.ajax({
            url: "/admin/delete-customers",
            type: "GET",
            data: { id: id },
            success: (data) => {
                if (data == 1) {
                    show_message("success", "Customar Delete Successfully");
                    loadCustomers();
                } else {
                    show_message("error", "Something Woring");
                }
            }
        });
    })



    // =====================================================================

    const loadModels = () => {
        $("#loading-model").text("loading...")
        $.ajax({
            url: "/admin/get-model",
            type: "GET",
            success: (data) => {
                $("#model-data").html(data);
                $("#loading-model").text("")

            }
        });
    }

    loadModels();


    $("#add-model").on("submit", function (e) {
        e.preventDefault();
        const brand = $("#brand").val();
        const model = $("#model").val();

        const formdata = new FormData(this);
        // if (brand == "" || model == "" ) {
        //     alert(brand)
        //     show_message("error", "Please Fill all The Field");
        // } else {
        $("#model-save").text("Saveing....")
        $.ajax({
            url: '/admin/create-model',
            type: "POST",
            data: formdata,
            contentType: false,
            processData: false,
            success: (data) => {
                if (data == 1) {
                    $("#model-save").text("Save");
                    show_message("success", "Model Add Successfully");
                    loadModels();
                    $("#add-model").trigger("reset");
                    $("#brand").modal("hide");
                } else if (data == 2) {
                    show_message("error", "Brand and Model all ready exist");
                    $("#model-save").text("Save");
                } else {
                    show_message("error", "Something Woring");
                }
            }

        })

        // }
    });


    $(document).on("click", "#editmodel", function () {
        const id = $(this).data("id");
        $("#loading").text("loading....");
        $.ajax({
            url: "/admin/edit-models",
            type: "GET",
            data: { id: id },
            success: (data) => {
                // console.log(data)
                $("#edit-model").html(data);
                $("#loading").text("");

            }
        });
    });



    $("#update-model").on("submit", function (e) {
        e.preventDefault();
        const model = $("#edit_model").val();
        const brand = $("#edit_brand").val();

        const formdata = new FormData(this);
        // if (model == "" || brand == "" ) {
        //     show_message("error", "Please Fill all The Field");
        // } else {
        $("#model-update").text("Updating....")
        $.ajax({
            url: '/admin/update-model',
            type: "POST",
            data: formdata,
            contentType: false,
            processData: false,
            success: (data) => {
                if (data == 1) {
                    show_message("success", "Model Udpate Successfully");
                    loadModels();
                    $("#model-update").text("Update");
                    $("#udpate-model").trigger("reset");
                    $("#updateModel").modal("hide");
                } else {
                    show_message("error", "Something Woring");
                }
            }

        })

        // }
    });


    $(document).on("click", "#delete-model", function () {
        const id = $(this).data("id");
        $.ajax({
            url: "/admin/delete-model",
            type: "GET",
            data: { id: id },
            success: (data) => {
                if (data == 1) {
                    $("#model-data").css({ display: "none" });
                    show_message("success", "Model Delete Successfully");
                    $("#model-data").css({ display: "block" });

                    loadModels();
                } else {
                    show_message("error", "Something Woring");
                }
            }
        });
    });

    const Order = () => {
        $("#loading-data").text("loading...")
        $.ajax({
            url: "/admin/get-order",
            type: "GET",
            success: (data) => {
                $("#order").html(data);
                $("#loading-data").text("")

            }
        });
    }
    Order();

    $(document).on("click","#approve",function(){
        const id=$(this).data("id");
        $.ajax({
            url: "/admin/approve",
            type: "GET",
            data: { id: id },
            success: (data) => {
                if (data == 1) {
                    show_message("success", "order approve successfully");
                    Order();
                } else {
                    show_message("error", "Something Woring");
                }
            }
        });
    })
    $(document).on("click","#reject",function(){
        const id=$(this).data("id");
        $.ajax({
            url: "/admin/reject",
            type: "GET",
            data: { id: id },
            success: (data) => {
                if (data == 1) {
                    show_message("success", "order reject successfully");
                    Order();
                } else {
                    show_message("error", "Something Woring");
                }
            }
        });
    })

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