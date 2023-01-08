$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $("body").on("click", "#delete-dish", function (menu) {
        var url = $(this).data("url");
        if (confirm("Are you sure you want to remove this user?") == true) {
            $.ajax({
                url,
                type: "DELETE",
                dataType: "json",
                data: menu,
            });
        }
    });
});
