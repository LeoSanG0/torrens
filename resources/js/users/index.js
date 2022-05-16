// Destroy
$(document).on("click", ".btn-modal-delete-user", function () {
    let route = $(this).data("route");

    $("#form_delete_user").attr("action", `${route}`);
    $("#modal_delete_user").modal("show");
});

$(document).on("click", ".btn-delete-user", function () {
    let route = $("#form_delete_user").attr("action");

    $.ajax({
        url: route,
        type: "POST",
        async: false,
    })
        .done(function (response) {
            if (response.type == "success") {
                Swal.fire({
                    title: "Exito!",
                    text: response.msg,
                    icon: response.type,
                    confirmButtonText: "Ok",
                });

                table_user.ajax.reload();
                $("#modal_delete_user").modal("hide");
            } else {
                Swal.fire({
                    title: "Error!",
                    text: response.msg,
                    icon: response.type,
                    confirmButtonText: "Ok",
                });
            }
        })
        .always(function () {})
        .fail(function () {});
});
