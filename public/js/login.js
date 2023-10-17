var url = baseUrl;
$(function () {
    $("#kt_sign_in_submit").on("click", function (e) {
        e.preventDefault();

        var username = $("#username").val();
        var password = $("#password").val();

        console.log(username, password);
        $.post(
            baseUrl + "http://127.0.0.1:8000/login",
            {
                username: username,
                password: password,
            },
            function (respdata) {
                console.log(respdata);
                if (respdata.status == "OK") {
                    Swal.fire({
                        title: "Login Berhasil!",
                        html: respdata.message,
                        icon: "success",
                        confirmButtonText: "Lanjutkan",
                    }).then(function () {
                        document.location.href = url;
                    });
                } else {
                    Swal.fire({
                        html: respdata.message,
                        icon: "error",
                        confirmButtonText: "Ok",
                    });
                }
            }
        );
    });
});
