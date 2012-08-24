var maps = [
	{ id: 'videos',        name: 'Videos'        },
	{ id: 'photos',        name: 'Photos'        },
	{ id: 'characters',    name: 'Characters'    },
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
setType(characters, "characters");
setType(photos, "photos");
setType(videos, "videos");

var allPoints = trip
		.concat(collaborators)
		.concat(interviews)
		.concat(characters)
		.concat(photos)
		.concat(videos);

var map_points;
var pt_markers = [];
var centerMap = new google.maps.LatLng(40.5472,8.920898);

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
                        icon: '/crisis/img/pin-' + point.type + '.png',
                        title: point.name
                }); 
                pt_markers[i] = marker;
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
                }   
        ];  

        var mapOptions = { 
                zoom: 5,
                center: centerMap,
                mapTypeControlOptions: {
                        mapTypeIds: ['videos', 'photos', 'characters', 'interviews', 'collaborators', 'trip']
                },  
                mapTypeId: 'trip'
        };  

        map_points = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);

        var myLatLng = new google.maps.LatLng(43.367776,-8.406222);

        showPoints(trip);

	for (var m in maps) {
		var map = maps[m];
		map_points.mapTypes.set(
			map.id,
			new google.maps.StyledMapType(basicStyle, { name: map.name })
		);
	}

	google.maps.event.addListener(map_points, 'maptypeid_changed', function(e){
		showPoints(
			allPoints.filter(function (elem, index, array) {
				return elem.type == map_points.getMapTypeId();
			})
		);
	});
}

