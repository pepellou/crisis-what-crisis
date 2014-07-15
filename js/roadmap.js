$(function() {
    var speechBubbles = [];

    $('#milestones .milestone').each(function() {
        speechBubbles.push({
            image: $(this).find('[name="image"]').text(),
            start: $(this).find('[name="start"]').text(),
            start: parseInt($(this).css('margin-left')),
            milestone: $(this).find('[class="signalBot"]').text(),
            link: $(this).find('[name="link"]').text(),
            text: $(this).find('[name="text"]').text()
        });
    });

    var lastPosition = 0;
    var opacity = 0;
    var lastBubble = null;

    function scrollEventHandler(position) {
        var bikePosition = position + 400;
        var currentBubble = null;
        var offset = 0;
        speechBubbles.forEach(function(bubble) {
            if (bikePosition >= bubble.start && bikePosition <= bubble.start + 800) {
                currentBubble = bubble;
            }
        });
        if ((position != lastPosition) && (currentBubble != null)) {
            offset = bikePosition - currentBubble.start;
            if ((0 <= offset) && (offset <= 200)) {
                opacity = offset/200;
            }
            if ((600 <= offset) && (offset <= 800)) {
                opacity = 1 - (offset-600)/200;
            }
            $('.background_front').css('opacity',opacity);
        }
        lastPosition = position;
        if (currentBubble != lastBubble) {
            if (currentBubble == null) {
                $('#speechBubble').css('display', 'none');
                $('.background_front').css('opacity','0');
            } else {
                $('#speechBubble div h1').html(currentBubble.milestone);
                $('#speechBubble div a').attr('href', currentBubble.link);
                $('#speechBubble span').html(currentBubble.text);
                $('#speechBubble').css('display', 'block');
                $img = $('<img/>').attr('src', 'img/roadmap/' + currentBubble.image).load(function() {
                    $('.background_front').attr('src','img/roadmap/' + currentBubble.image);
                    $(this).remove();
                    $img = null;
                });
            }
            lastBubble = currentBubble;
        }
    }

    setTimeout(function() {
        scrollEventHandler($(window).scrollLeft());
        setTimeout(arguments.callee, 20);
    }, 20);

    function displayWheel(e) {
        var evt = window.event || e;
        var delta = evt.detail? evt.detail*(-40) : evt.wheelDelta;
        $(window).scrollLeft($(window).scrollLeft() - delta/3);
    }

    var mouseWheelEvt = (/Firefox/i.test(navigator.userAgent))? "DOMMouseScroll" : "mousewheel";

    if (document.attachEvent)
        document.attachEvent("on" + mouseWheelEvt, displayWheel);
    else if (document.addEventListener)
        document.addEventListener(mouseWheelEvt, displayWheel, false);

    $(window).bind('keydown keypress', function(e) {
        if ((e.keyCode == 37)||(e.keyCode == 38)) {
            e.preventDefault();
            $(window).scrollLeft($(window).scrollLeft() - 40);
        }
        if ((e.keyCode == 39)||(e.keyCode == 40)) {
            e.preventDefault();
            $(window).scrollLeft($(window).scrollLeft() + 40);
        }
    });
    $('#road').focus();
});
