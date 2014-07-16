var position = {

    get: function() {
        return $(window).scrollLeft();
    },

    reset: function() {
        $(window).scrollLeft(0);
        repaint();
    },

    move: function(delta) {
        $(window).scrollLeft($(window).scrollLeft() + delta);
        repaint();
    }

};
