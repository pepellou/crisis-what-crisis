people = [
	{
		"type": "people",
		"who": "Fulanito de Mengano",
	   	"where": "En un lugar de la mancha",
	   	"what": "Molinos de viento solares",
	   	"why": "Por que hay sol y viento y es gratis",
	   	"how" : "???",
	   	"web" : "http://www.web1.com",
	   	"contact" : "email@email.com",
	   	"links" : [
	   		"link1",
	   		"link2"
	   	],
	   	"photo" : "img/people/who.png",
	   	"images" : [
	   		"http://www.crisis-whatcrisis.com/img/people/image1.png",
	   		"http://www.crisis-whatcrisis.com/img/people/image2.png"
	   	],
   		"lat" : "42.340212",
   		"lng" : "-7.869221"
	},
]

/*
function exampleLog() {
	for (i in people) {
		console.log(people[i].who);
		console.log(people[i].where);
		console.log(people[i].what);
		console.log(people[i].why);
		console.log(people[i].how);
		console.log(people[i].web);
		console.log(people[i].contact);
		for (y in people[i].links) {
			console.log(people[i].links[y]);
		}
		console.log(people[i].photo);
		for (y in people[i].images) {
			console.log(people[i].images[y]);
		}
		console.log(people[i].lat);
		console.log(people[i].lng);
	}
}

$(function() {
	exampleLog();
});
*/

function showPeople(
	people
) {
	doModal(function() {
		$("#people").css("display","inline");
		$("#people").css("left", (((parseInt($("body").width()-1200))/2) + 100) + "px");
		$("#people .who .text").html(people.who);
		$("#people .where .text").html(people.where);
		$("#people .what .text").html(people.what);
		$("#people .why .text").html(people.why);
		$("#people .how .text").html(people.how);
		$("#people .web").html("web: <a href='" + people.web + "' target='blank'>" + people.web + "</a>");
		$("#people .contact").html("contact: <a href='mailto:" + people.contact + "'>" + people.contact + "</a>");
		$("#people .photo").css("background-image","url(" + people.photo + ")");
		for (i in people.links) {
			$("#people .links").append("<a href='" + people.links[i] + "' target='blank'><div class='link'>" + people.links[i] + "</div></a>");
		}
	});
}