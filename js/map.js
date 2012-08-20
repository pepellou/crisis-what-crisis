var map_points;
var pt_markers = [];
var centerMap = new google.maps.LatLng(40.5472,8.920898);
var MAPTYPE_ID = 'points';

function showPoints(
        points
) {
        var image = '/crisis/img/pin.png';
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
                        icon: image,
                        title: point.name
                }); 
                pt_markers[i] = marker;
        }   
}

function setUpMap(
        points
) {
        var stylez = [ 
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
                        mapTypeIds: [google.maps.MapTypeId.ROADMAP, MAPTYPE_ID]
                },  
                mapTypeId: MAPTYPE_ID
        };  

        map_points = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);

        var myLatLng = new google.maps.LatLng(43.367776,-8.406222);

        showPoints(points);
    
        var styledMapOptions = { name: "Startup" };

        var jayzMapType = new google.maps.StyledMapType(stylez, styledMapOptions);
  
        map_points.mapTypes.set(MAPTYPE_ID, jayzMapType);
}
