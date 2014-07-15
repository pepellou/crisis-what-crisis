<?php
    require_once dirname(__FILE__)."/milestones.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=1280, maximum-scale=1.0" />	
	<link href="countdown/style/dark.css" media="screen" rel="stylesheet" type="text/css" >
	<link href="css/fonts.css" media="screen" rel="stylesheet" type="text/css" >
	<link href="css/money.css" media="screen" rel="stylesheet" type="text/css" >
	<link href="css/style.css" media="screen" rel="stylesheet" type="text/css" >
	<link href="css/roadmap.css" media="screen" rel="stylesheet" type="text/css" >
	<link rel="icon" type="image/png" href="favicon.png">
	<title>Crisis - What Crisis</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta property="og:image" content="http://www.crisis-whatcrisis.com/img/logo.png" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="http://www.crisis-whatcrisis.com" />
	<meta property="og:title" content="Crisis - What crisis?" />
	<meta property="og:description" content= "It's a documentary portraying the 2012's Europe. A trip from Galicia, in the Iberian Peninsula's Northwest extreme, to the Pireo in Greece, across Portugal, Spain and Italy (PIGS)*.  It's a critical eye to the CRISIS. A practical and brave answer to that questions we should ask: What is the crisis? Where does it come from? Where does it lead us? AND NOW WHAT?" />
	<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
	<script type="text/javascript" 
		src="http://maps.googleapis.com/maps/api/js?key=AIzaSyD8VKWnsMR8-zmp5dW7YOInsVjib26h840&sensor=false">
	</script>
		
	<!-- Developed by Pepe Doval - see http://www.crisis-whatcrisis.com/humans.txt -->

	<script language="javascript">
        $(function() {
            var speechBubbles = [];

            $('#milestones .milestone').each(function() {
                speechBubbles.push({
                    id: $(this).find('[name="id"]').text(),
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
                        $img = $('<img/>').attr('src', 'img/roadmap/roadmap_'+(currentBubble.id)+'.jpg').load(function() {
                            $('.background_front').attr('src','img/roadmap/roadmap_'+(currentBubble.id)+'.jpg');
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
    </script>
</head>
<body>
    <div class="background">
        <img class="background_front"/>
    </div>
    <div class="header_roadmap">
        <a href="index.php"><img class="logo_roadmap" src="img/logo.png" alt="Web logo: Crisis What Crisis - An optimistic answer"/></a>
    </div>
    <div class="gradient">
    </div>
    <div id="xavi">
        <div id="speechBubble" style="display: none;">
            <div style="z-index: 20;">
                <h1></h1>
                <a href="' + currentBubble.link + '" target="_blank"><img src="img/play_alpha.png"></a>
            </div>
            <span></span>
        </div>
    </div>
    <div id="road">
        <div id="roadline"></div>
    </div>
    <div id="mountains"></div>
    <div id="milestones">
        <?php foreach (Milestones::all() as $milestone) { ?>
            <div class="milestone" style="margin-left: <?php echo $milestone->start; ?>px">
                <div class="signalTop"><?php echo $milestone->start; ?></div>
                <div class="signalBot"><?php echo $milestone->date; ?></div>
                <div class="signalStick"></div>
                <div class="hidden" name="id"><?php echo $milestone->id; ?></div>
                <div class="hidden" name="link"><?php echo $milestone->link; ?></div>
                <div class="hidden" name="text"><?php echo $milestone->text; ?></div>
            </div>
        <?php } ?>
    </div>
</body>
</html>
