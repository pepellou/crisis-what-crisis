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
var centerMap = new google.maps.LatLng(40.5472,8.920898);

function AddControl(title, text, map, index) {
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
	});

	controlDiv.index = index;
	map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(controlDiv);
}

function showPoints(
        points
) {
        for (var i in pt_markers) {
                marker = pt_markers[i];
                marker.setMap(null);
        }   
        pt_markers = []; 
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
	zoom
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

	if (zoom > 5) {
	        showPoints(trip);
	} else {
		showPoints(trip.filter(function (elem, index, array) {
			return (index % 2 == 0 && index != array.length - 2) || (index == array.length - 1);
		}));
	}
}

function setUpMap(
) {
        var basicStyle = [ 
                {   
                        featureType: "water",
                        elementType: "all",
                        stylers: [
                                { hue: '#cdcdc1' },
                                { saturation: -76 },
                                { lightness: 8 },
                                { visibility: 'on' }
                        ]   
                },
  {
    featureType: "water",
    stylers: [
      { "visibility": "on" },
      { "invert_lightness": true }
    ]
  },{
    featureType: "landscape.natural",
    stylers: [
      { visibility: "on" },
      { color: "#f00" }
    ]
  },{
    featureType: "landscape.man_made",
    elementType: "geometry.fill",
    stylers: [
      { visibility: "on" },
      { color: "#f00" }
    ]
  },{
    featureType: "poi.park",
    elementType: "geometry.fill",
    stylers: [
      { visibility: "on" },
      { color: "#808080" }
    ]
  },{
    featureType: "landscape.natural",
    elementType: "labels.text.fill",
    stylers: [
      { visibility: "on" },
      { color: "#f00" }
    ]
  },{
    featureType: "road.highway",
    elementType: "geometry.fill",
    stylers: [
      { visibility: "on" },
      { weight: 1.2 },
      { color: "#2c4390" },
      { hue: "#00bbff" },
      { saturation: 45 },
      { lightness: -25 }
    ]
  },{
    featureType: "road.highway.controlled_access",
    stylers: [
      { color: "#947f72" },
      { visibility: "on" },
      { hue: "#ff0000" },
      { saturation: -81 },
      { lightness: 30 }
    ]
  },{
    featureType: "road.highway.controlled_access",
    elementType: "geometry.stroke",
    stylers: [
      { color: "#e70000" }
    ]
  },{
    featureType: "road.highway.controlled_access",
    elementType: "labels.text.fill",
    stylers: [
      { visibility: "on" },
      { invert_lightness: true },
      { color: "#e9fdff" }
    ]
  },{
    featureType: "road.arterial",
    elementType: "geometry.fill",
    stylers: [
      { visibility: "on" },
      { invert_lightness: true },
      { color: "#e78557" }
    ]
  },{
    featureType: "road.local",
    elementType: "geometry.fill",
    stylers: [
      { visibility: "on" },
      { invert_lightness: true },
      { color: "#ada59e" }
    ]
  },{
    featureType: "road.arterial",
    stylers: [
      { color: "#d98c6e" }
    ]
  },{
    featureType: "road.arterial",
    elementType: "labels.text.fill",
    stylers: [
      { visibility: "on" },
      { color: "#130609" }
    ]
  }
        ];  

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
			new google.maps.StyledMapType(basicStyle, { name: map.name })
		);
	}
	google.maps.event.addListener(map_points, 'zoom_changed', function(e){
		drawTrip(map_points.getZoom());
	});

	AddControl('Show videos',        'VIDEOS',        map_points, 6);
	AddControl('Show photos',        'PHOTOS',        map_points, 5);
	AddControl('Show people',        'PEOPLE',        map_points, 4);
	AddControl('Show interviews',    'INTERVIEWS',    map_points, 3);
	AddControl('Show collaborators', 'COLLABORATORS', map_points, 2);
	AddControl('Show trip stops',    'TRIP',          map_points, 1);

	drawTrip(5);
}
