if (window.$) {
    $(function() {
        $.ajax({ 
            type: "POST", 
            url:  "get-photos.php",
            data: "",
            success: function(msg) { 
                var thePhotos = eval( "(" + msg + ")" );
                for (var p in thePhotos) {
                    var photo = thePhotos[p];
                    $.ajax({ 
                        type: "POST", 
                        url:  "get-photos.php",
                        data: "photo_link=" + photo.link,
                        success: function(msg) { 
                            addPhoto(eval("(" + msg + ")" ));
                        }
                    });
                }
            }           
        });
    });
}

function addPhoto(
    photo
) {
    photos.push({ 
        name: photo.title, 
        lat: photo.lat,
        lng: photo.lng,
        type: "photos",
        url: photo.link,
        img: photo.image,
        width: photo.width,
        height: photo.height
    });
}

function showPhoto(
    photo
) {
    doModal(function() {
        $('#previewPhoto').css({
            "display": "block",
            "margin-top": -photo.height / 2,
            "margin-left": -(parseInt(photo.width) + 320) / 2
        });
        $('#previewPhoto .right').css("height", photo.height);
        $('#previewPhoto .left').css("height", photo.height);
        $('#previewPhoto .thePhoto').html(
            '<a target="_blank" href="' + photo.url 
                + '" title="' + photo.title
                + '"><img src="' + photo.img
                + '" width="' + photo.width
                + '" height="' + photo.height
                + '" alt="' + photo.title
                + '"></a>'
        );
    });
}
