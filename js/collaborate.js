$(function() {
	$("#collaborate_button").mouseup(function() {
		doModal(function() {
			$("#contact").css("display","inline");
			$("#contact").css("left", (parseInt($("body").css("width")) / 2) - (parseInt($("#contact").css("width")) / 2));
		});
	});
		doModal(function() {
			$("#contact").css("display","inline");
			$("#contact").css("left", (parseInt($("body").css("width")) / 2) - (parseInt($("#contact").css("width")) / 2));
		});
});
