<?php
	require_once dirname(__FILE__)."/mobile-detection.php";

	require_once dirname(__FILE__)."/get-videos.php";
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
	<link rel="icon" type="image/png" href="favicon.png">
	<title>Crisis - What Crisis</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta property="og:image" content="http://www.crisis-whatcrisis.com/img/logo.png" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="http://www.crisis-whatcrisis.com" />
	<meta property="og:title" content="Crisis - What crisis?" />
	<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
	<script type="text/javascript" 
		src="http://maps.googleapis.com/maps/api/js?key=AIzaSyD8VKWnsMR8-zmp5dW7YOInsVjib26h840&sensor=false">
	</script>
	<script language="javascript" src="js/map/trip.js"></script>
	<script language="javascript" src="js/map-style.js"></script>
	<script language="javascript" src="js/map.js"></script>
	<script language="javascript" src="js/menu.js"></script>
	<script language="javascript" src="js/modal.js"></script>
	<script language="javascript" src="js/photos.js"></script>
	<script language="Javascript" src="js/money.js"></script>
	<script language="javascript" src="js/translate.js"></script>
	<script language="Javascript" type="text/javascript" src="countdown/js/jquery.lwtCountdown-1.0.js"></script>
	<script language="Javascript" type="text/javascript" src="countdown/js/misc.js"></script>
	<script language="Javascript" type="text/javascript" src="js/jqBarGraph.1.1.min.js"></script>
		
	<!-- Developed by Hermanos Karapatrov - see http://www.crisis-whatcrisis.com/humans.txt -->

</head>
<body>
	<div id="top_block">
		<div id="countdown_dashboard">
			<h1 style="color: white">Count-Down for the Trip</h1>
			<div class="dash weeks_dash">
				<span class="dash_title">weeks</span>
				<div class="digit">1</div>
				<div class="digit">6</div>
			</div>

			<div class="dash days_dash">
				<span class="dash_title">days</span>
				<div class="digit">0</div>
				<div class="digit">4</div>
			</div>

			<div class="dash hours_dash">
				<span class="dash_title">hours</span>
				<div class="digit">1</div>
				<div class="digit">1</div>
			</div>

			<div class="dash minutes_dash">
				<span class="dash_title">minutes</span>
				<div class="digit">3</div>
				<div class="digit">9</div>
			</div>

			<div class="dash seconds_dash">
				<span class="dash_title">seconds</span>
				<div class="digit">1</div>
				<div class="digit">8</div>
			</div>
		</div>
		<div id="money"> </div>
	</div>

	<div id="idiomas">
		<a href="#" class="selected" name="idioma_en">english</a> |
		<a href="#" name="idioma_gl">galego</a> |
		<a href="#" name="idioma_es">espa&ntilde;ol</a>
	</div>
	<div id="sheet">
		<img src="img/header.png" />
		<div id="map_canvas"></div>
		<div id="map_cover"></div>
		<a id="linkSupport" href="support.php?lan=en" target="blank"><img id="collaborate_button" src="img/donate_ing.png" class="donateImg" /></a>
		<div id="slider">
			<img width="1200px" style="margin-top: -285px;" src="http://farm9.staticflickr.com/8036/7969876764_9d76db9536_b.jpg" />
		</div>
		<div id="menu">
			<ul>
				<li><a href="#" name="what">  What  </a></li>
				<li><a href="#" name="why">   Why   </a></li>
				<li><a href="#" name="who">   Who   </a></li>
				<li><a href="#" name="where"> Where </a></li>
				<li><a href="#" name="how">   How   </a></li>
		</div>
		<img class="line what" src="img/lineto-what.png" />
		<div class="box what"> </div>
		<img class="line why" src="img/lineto-why.png" />
		<div class="box why"> </div>
		<img class="line who" src="img/lineto-who.png" />
		<div class="box who"> </div>
		<img class="line where" src="img/lineto-where.png" />
		<div class="box where"> </div>
		<img class="line how" src="img/lineto-how.png" />
		<div class="box how"> </div>
	</div>

	<div id="black-background" class="modal"></div>

	<div id="videos">
	<?php 	foreach (getVideos("pepellou", "music") as $video) { ?>
			<div class="video">
				<div name="title"><?php echo $video['title']; ?></div>
				<div name="link"><?php echo $video['link']; ?></div>
				<div name="gps">
					<div name="lat"><?php echo $video['lat']; ?></div>
					<div name="lng"><?php echo $video['lng']; ?></div>
				</div>
			</div>
	<?php 	} ?>
	</div>

	<div id="previewVideo" class="modal">
		<div class="left"></div>
		<div class="theVideo"></div>
		<div class="right"></div>
	</div>

	<div id="previewPhoto" class="modal">
		<div class="left"></div>
		<div class="thePhoto"></div>
		<div class="right"></div>
	</div>

	<script language="javascript" type="text/javascript">
		$(function() {
			$('#countdown_dashboard').countDown({
				targetDate: {
					'day': 15,
					'month': 10,
					'year': 2012,
					'hour': 7,
					'min': 0,
					'sec': 7
				}
			});
		});
	</script>

	<div id="footer">
		<div class="mountains"></div>
		<div class="things"></div>
		<div class="road"></div>
		<div class="moto"></div>
		<div style="width: 100%; background: black;">
			<div class="ground">
				<div class="block">
					<img src="img/sponsors/karapatrov.png" /><br/><br/><br/><br/>
					<img src="img/sponsors/agil-az.png" />
				</div>
				<div class="block">
					<h2>Dossier</h2>
					<object style="width:420px;height:210px" >
						<param name="movie" value="http://static.issuu.com/webembed/viewers/style1/v2/IssuuReader.swf?mode=mini&amp;embedBackground=%23000000&amp;backgroundColor=%23222222&amp;documentId=120911185036-2adc3ed03adc429ba9f572db6189c3b5" />
						<param name="allowfullscreen" value="true"/>
						<param name="menu" value="false"/>
						<param name="wmode" value="transparent"/>
						<embed src="http://static.issuu.com/webembed/viewers/style1/v2/IssuuReader.swf" type="application/x-shockwave-flash" allowfullscreen="true" menu="false" wmode="transparent" style="width:420px;height:210px" flashvars="mode=mini&amp;embedBackground=%23000000&amp;backgroundColor=%23222222&amp;documentId=120911185036-2adc3ed03adc429ba9f572db6189c3b5" />
					</object>
					<div style="width:420px;text-align:left;">
						<a href="http://issuu.com/xavierbelho7/docs/crisiswhatcrisis1?mode=window&amp;backgroundColor=%23222222" target="_blank" style="color: white;">Open publication</a> - Free <a href="http://issuu.com" target="_blank" style="color: white;">publishing</a> - <a href="http://issuu.com/search?q=crisis" target="_blank" style="color: white;">More crisis</a></div></div>
			</div>
		</div>
	</div>
</body>
</html>
