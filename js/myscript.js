// Float button...
$(document).click(function (event) {
    $('.btn-floating').removeClass("active");
    if ($(event.target).closest('.btn-floating').length) {
        $('.btn-floating').addClass("active");
    }
});