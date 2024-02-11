$(document).ready(function () {
    setInterval(function() {
        $.ajax({
            type: "GET",
            url: "/cookie-delete",
            success: function (data) {
                window.location.reload();
            }
        });
    }, 60000);
});
