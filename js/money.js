function calculateMoney() {
    var money = 25;
    var width = $('.km').width();
    var widthMoto = $('.motorbike img').width();
    $('.km_yellow').css("width", money * (width/3080) + "px");
    $('.motorbike img').css("left", (money * (width/3080))-(widthMoto) + "px");
}
