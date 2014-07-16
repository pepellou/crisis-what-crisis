var Position = {

    get: function() {
        return $(window).scrollLeft();
    },

    reset: function() {
        Position._set(0);
        repaint();
    },

    move: function(delta) {
        Position._set(Position.get() + delta);
        repaint();
    },

    place: function(location) {
        if (location == 'begin') {
            Position.reset();
        }
        if (location == 'end') {
            Position._set($('#road').width() - $(window).width());
        }
    },

    _set: function(position) {
        $(window).scrollLeft(position);
    }

};
