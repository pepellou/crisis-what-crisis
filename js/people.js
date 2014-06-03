function showPeople(
	person
) {
	doModal(function() {
		$("#person_" + person.id).css("display", "inline");
		$("#person_" + person.id).css("left", (((parseInt($("body").width()-1200))/2) + 100) + "px");
	});
}
