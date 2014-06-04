function doModal(
    drawFunction
) {
    $('#black-background').css("display", "block");
    drawFunction();
    $('#black-background').click(function () {
        $('.modal').css("display", "none");
    });
}
