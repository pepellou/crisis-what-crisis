var BackgroundImage = {

    show: function(image, opacity) {
        $('.background_front').css('opacity', opacity);
        $('<img/>').attr('src', 'img/roadmap/' + image).load(function() {
            $('.background_front').attr('src','img/roadmap/' + image);
            $(this).remove();
        });
    },

    hide: function() {
        $('.background_front').css('opacity', '0');
    }

};
