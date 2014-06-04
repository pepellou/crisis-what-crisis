var map_style = [
    {
        featureType: "water",
        stylers: [
            { "visibility": "on" },
            { color: "#444444" }
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
