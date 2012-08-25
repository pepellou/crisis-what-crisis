var maps = [
	{ id: 'videos',        name: 'Videos'        },
	{ id: 'photos',        name: 'Photos'        },
	{ id: 'people',        name: 'People'        },
	{ id: 'interviews',    name: 'Interviews'    },
	{ id: 'collaborators', name: 'Collaborators' },
	{ id: 'trip',          name: 'Trip'          }
];

function setType(
	array,
	type
) {
	for (var t in array) {
		array[t].type = type;
	}
}

setType(trip, "trip");
setType(collaborators, "collaborators");
setType(interviews, "interviews");
setType(people, "people");
setType(photos, "photos");
setType(videos, "videos");

var allPoints = trip
		.concat(collaborators)
		.concat(interviews)
		.concat(people)
		.concat(photos)
		.concat(videos);

var map_points;
var pt_markers = [];
var current = trip[trip.length - 1]
var centerMap = new google.maps.LatLng(current.lat, current.lng);

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
	controlUI.style.height = '39px';
	controlUI.title = title;
	controlDiv.appendChild(controlUI);

	var controlText = document.createElement('div');
	controlText.style.fontFamily = 'TungstenMedium,Arial,sans-serif';
	controlText.style.fontSize = '35px';
	controlText.style.paddingLeft = '4px';
	controlText.style.paddingRight = '4px';
	controlText.innerHTML = text;
	controlUI.appendChild(controlText);

	google.maps.event.addDomListener(controlUI, 'click', function() {
		callback();
	});

	controlDiv.index = index;
	map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(controlDiv);
}

function clearMap(
) {
        for (var i in pt_markers) {
                marker = pt_markers[i];
                marker.setMap(null);
        }   
        pt_markers = []; 
}

function showPoints(
        points
) {
	clearMap();
        for (var i in points) {
                point = points[i];
                marker = new google.maps.Marker({
                        position: new google.maps.LatLng(point.lat, point.lng),
                        map: map_points,
                        icon: new google.maps.MarkerImage(
				'/crisis/img/pin-' + point.type + '.png',
				new google.maps.Size(50, 50),
				new google.maps.Point(0,0),
				new google.maps.Point(25, 25)
			),
                        title: point.name
                }); 
                pt_markers[i] = marker;
        }   
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

function setUpMap(
) {
        var mapOptions = { 
                zoom: 5,
                center: centerMap,
                mapTypeControl: false,
		scrollwheel: false,
		scaleControl: false,
                mapTypeId: 'trip'
        };  

        map_points = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);

        var myLatLng = new google.maps.LatLng(43.367776,-8.406222);

	for (var m in maps) {
		var map = maps[m];
		map_points.mapTypes.set(
			map.id,
			new google.maps.StyledMapType(map_style, { name: map.name })
		);
	}
	google.maps.event.addListener(map_points, 'zoom_changed', function(e){
		drawTrip(map_points.getZoom());
	});

	drawTrip();
}
