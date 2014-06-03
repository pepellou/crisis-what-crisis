people = [
	{
		"type": "people",
		"who": "Fátima García Doval",
	   	"where": "Santiago de Compostela",
	   	"what": "Accegal",
	   	"why": "Mucha gente pequeña, en lugares pequeños, haciendo cosas pequeñas, puede cambiar el mundo.",
	   	"how" : "En la actualidad el trabajo está centrado en la comunicación, especialmente alternativa y aumentativa. Trabajamos conjuntamente con otros centros, asociaciones y particulares, de modo totalmente desinteresado y sin ánimo de lucro para que nuestras aplicaciones sean gratuitas y funcionen en dispositivos de bajo costo.",
	   	"web" : "http://www.accegal.org/",
	   	"contact" : "contacto@accegal.org",
	   	"links" : [
	   		"https://es-es.facebook.com/Accegal",
	   		"http://www.youtube.com/user/accegal",
			"https://twitter.com/Accegal"
	   	],
	   	"photo" : "img/people/Fatima.png",
	   	"images" : [
	   		"img/people/Accegal1.png",
	   		"img/people/Accegal2.png"
	   	],
		"lat" : "42.884974",
		"lng" : "-8.556708"
	},
	{
		"type": "people",
		"who": "Xavi Gost",
	   	"where": "Valencia",
	   	"what": "La Cova de Benimaclet",
	   	"why": "Hazlo tú mismo, rechaza los dogmas y desconfía de las modas",
	   	"how" : "En La Cueva de Benimaclet hay programadores haciendo software, pero también cursos de magia, talleres para aprender a radiar ruedas de bicicleta, cajas de verdura ecológica, cine, mercaditos de trueque, cursos de formación, talleres de desobediencia civil...",
	   	"web" : "https://www.facebook.com/lacuevadebenimaclet",
	   	"contact" : "lacovadebenimaclet@gmail.com",
	   	"links" : [
	   		"https://trello.com/b/wYQZxmvz/la-cueva",
	   		"https://www.google.com/calendar/embed?src=6u8npmhel4qp5djn6bvl140hvk%40group.calendar.google.com&ctz=Europe%2FMadrid",
			"https://twitter.com/XLaCovaX"
	   	],
	   	"photo" : "img/people/XaviGost.png",
	   	"images" : [
	   		"img/people/LaCova1.png",
	   		"img/people/LaCova2.png"
	   	],
   		"lat" : "39.488443",
   		"lng" : "-0.360331"
	},
]

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
		$("#people .links").html("");
		for (i in people.links) {
			$("#people .links").append("<a href='" + people.links[i] + "' target='blank'><div class='link'>" + people.links[i] + "</div></a>");
		}
	});
}
