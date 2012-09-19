$(function() {
	var money = 574;
	var width = $('.km').width();
	var widthMoto = $('.motorbike img').width();

	$('.km_yellow').css("width", money * (width/3000) + "px");
	$('.motorbike img').css("left", (money * (width/3000)-(widthMoto/2)) + "px");
});
