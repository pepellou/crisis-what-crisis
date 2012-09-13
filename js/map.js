$(function() {
	setUpMap();
	var fadeMap = setInterval(
		function () {
			var theOpacity = $('#map_cover').css('opacity');
			if (theOpacity < 0.02) {
				$('#map_cover').css('display', 'none');
				clearInterval(fadeMap);
			} else {
				$('#map_cover').css('opacity', theOpacity - 0.01);
			}
		},
		10
	);
});

var photos = [];

var map_points;
var map_controls = [];
var pt_markers = [];
var centerMap = new google.maps.LatLng(40.5472, 6);

function setUpMap(
) {
	map_points = createMap();
	addControlButtons(map_points);
	drawTrip();
}

function createMap(
) {
        map = new google.maps.Map(
		document.getElementById("map_canvas"),
		{ 
			zoom: 5,
			center: centerMap,
			mapTypeControl: false,
			scrollwheel: false,
			scaleControl: false,
			mapTypeId: 'trip'
		}
	);
	map.mapTypes.set(
		'trip',
		new google.maps.StyledMapType(map_style, { name: 'Trip' })
	);
	google.maps.event.addListener(map, 'zoom_changed', function(e){
		drawCurrentMap();
	});
	return map;
}

function addControlButtons(
	map
) {
	AddControl('Show videos',     'VIDEOS', map, 6, setCurrentMap('videos') );
	AddControl('Show photos',     'PHOTOS', map, 5, setCurrentMap('photos') );
	AddControl('Show people',     'PEOPLE', map, 4, setCurrentMap('people') );
	AddControl('Show trip stops', 'TRIP',   map, 1, setCurrentMap('trip') );
}

function AddControl(title, text, map, index, callback) {
	var controlDiv = document.createElement('div');

	controlDiv.style.padding = '5px';

	var controlUI = document.createElement('div');
	controlUI.style.backgroundColor = '#1c1c1b';
	controlUI.style.color = 'white';
	controlUI.style.borderStyle = 'solid';
	controlUI.style.borderWidth = '2px';
	controlUI.style.cursor = 'pointer';
	controlUI.style.textAlign = 'center';
	controlUI.style.height = '64px';
	controlUI.style.marginTop = '6px';
	controlUI.title = title;
	controlDiv.appendChild(controlUI);

	var controlText = document.createElement('div');
	controlText.style.fontFamily = 'TungstenMedium,Arial,sans-serif';
	controlText.style.fontSize = '60px';
	controlText.style.paddingLeft = '8px';
	controlText.style.paddingRight = '8px';
	controlText.innerHTML = text;
	controlUI.appendChild(controlText);

	google.maps.event.addDomListener(controlUI, 'click', function() {
		callback();
	});

	controlDiv.index = index;
	map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(controlDiv);

	map_controls.push(
		{ name: text, controlUI: controlUI, controlText: controlText }
	);
}

function clearMap(
) {
        for (var i in pt_markers) {
                marker = pt_markers[i];
                marker.setMap(null);
        }   
        pt_markers = []; 
}

function clickOnMarker(
	marker
) {
	return function () {
		if (currentMap == 'videos') {
			open_in_self_page(marker.url);
		}
		if (currentMap == 'photos') {
			showPhoto(marker);
		}
	};
}

function open_in_new_tab(
	url
) {
	window.open(url, '_blank');
	window.focus();
}

function open_in_self_page(
	url
) {
	doModal(function() {
		$("#previewVideo").css("display","inline");
		$("#previewVideo").css("left", (parseInt($("body").css("width")) / 2) - (parseInt($("#previewVideo").css("width")) / 2));

		var embeddedUrl = url.replace("https", "http");
		embeddedUrl = embeddedUrl.replace("&amp;feature=youtube_gdata", "");
		embeddedUrl = embeddedUrl.replace(".com/", ".com/embed/");
		embeddedUrl = embeddedUrl.replace("watch?v=", "");

		$("#previewVideo .theVideo").html('<iframe width="420" height="315" src="' + embeddedUrl + '" frameborder="0"></iframe>');
	});
}

function showPoints(
        points
) {
	clearMap();
        for (var i in points) {
		drawMarker(points[i]);
        }   
}

function drawMarker(
	point
) {
	var pinLocation = new google.maps.Point(25, 25);
	if (point.type != 'trip') {
		pinLocation = new google.maps.Point(25, 50);
	}
	var marker = new google.maps.Marker(
		$.extend(
			{
				position: new google.maps.LatLng(point.lat, point.lng),
				map: map_points,
				icon: new google.maps.MarkerImage(
					'/img/pin-' + point.type + '.png',
					new google.maps.Size(50, 50),
					new google.maps.Point(0,0),
					pinLocation
				),
				title: point.name
			}, 
			point
		)
	); 
	google.maps.event.addListener(
		marker,
		'click',
		clickOnMarker(marker)
	);
	pt_markers.push(marker);
}

function drawPhotos(
) {
	clearMap();
	showPoints(photos);
}

function drawVideos(
) {
	clearMap();
	var videos = [];
	$('#videos .video').each(function() {
		var lat = $(this).find('div[name="lat"]').html();
		if (lat != '') {
			var title = $(this).find('div[name="title"]').html();
			var lng = $(this).find('div[name="lng"]').html();
			var url = $(this).find('div[name="link"]').html();
			videos.push({ 
				name: title, 
				lat: lat, 
				lng: lng, 
				type: "videos",
				url: url
			});
		}
	        showPoints(videos);
	});
}

function drawTrip(
) {
	var itinerary = [];
	for (var p in trip) {
		var point = trip[p];
		itinerary.push(new google.maps.LatLng(point.lat, point.lng));
	}
	new google.maps.Polyline({
		path: itinerary,
		strokeColor: "#2c4390",
		strokeOpacity: 1.0,
		strokeWeight: 9
	}).setMap(map_points);
	new google.maps.Polyline({
		path: itinerary,
		strokeColor: "#ffec00",
		strokeOpacity: 1.0,
		strokeWeight: 5
	}).setMap(map_points);

	if (map_points.getZoom() > 5) {
	        showPoints(trip);
	} else {
		showPoints(trip.filter(function (elem, index, array) {
			return (index % 2 == 0 && index != array.length - 2) || (index == array.length - 1);
		}));
	}
}

var currentMap = "trip";

function setCurrentMap(
	type
) {
	return function() {
		currentMap = type;
		drawCurrentMap();
	};
}

function drawCurrentMap(
) {
	if (currentMap == 'trip') {
		drawTrip();
	} else if (currentMap == 'videos') {
		drawVideos();
	} else if (currentMap == 'photos') {
		drawPhotos();
	} else {
		clearMap();
	}
}
