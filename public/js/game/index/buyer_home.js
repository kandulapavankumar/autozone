$(document).ready(function() {
    $(".select_vehical").selectpicker();

    $(".clickable-row").click(function() {
        window.document.location = $(this).data("href");
    });

});

