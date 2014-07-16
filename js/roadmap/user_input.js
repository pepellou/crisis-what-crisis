var Keys = {
    LEFT: 37,
    UP: 38,
    RIGHT: 39,
    DOWN: 40,
    PAGE_DOWN: 34,
    PAGE_UP: 33,
    HOME: 36,
    END: 35
};

var UserInput = {

    onMove: function(callback) {
        var wheelCallback = function(e) {
            var evt = window.event || e;
            var delta = evt.detail? evt.detail*(-40) : evt.wheelDelta;
            callback(-delta/3);
        };

        var mouseWheelEvt = (/Firefox/i.test(navigator.userAgent))? "DOMMouseScroll" : "mousewheel";

        if (document.attachEvent) {
            document.attachEvent("on" + mouseWheelEvt, wheelCallback);
        } else if (document.addEventListener) {
            document.addEventListener(mouseWheelEvt, wheelCallback, false);
        }

        $(window).bind('keydown keypress', function(e) {
            e.preventDefault();
            switch (e.keyCode) {
                case Keys.LEFT:
                case Keys.UP:
                    callback(-40);
                    break;
                case Keys.RIGHT:
                case Keys.DOWN:
                    callback(40);
                    break;
            }
        });
    }

};
