<?php
	require_once dirname(__FILE__)."/mobile-detection.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=1280, maximum-scale=1.0" />	
	<!-- <base href = "http://www..com/" > -->
	<link href="css/fonts.css" media="screen" rel="stylesheet" type="text/css" >
	<link href="css/style.css" media="screen" rel="stylesheet" type="text/css" >
	<title>Crisis - What Crisis</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<!--
	<meta property="og:image" content="http://www.crisis-whatcrisis.com/img/logo.png" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="http://www.crisis-whatcrisis.com" />
	<meta property="og:title" content="crisis-whatcrisis" />
	-->
	<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
	<script type="text/javascript" 
		src="http://maps.googleapis.com/maps/api/js?key=AIzaSyD8VKWnsMR8-zmp5dW7YOInsVjib26h840&sensor=false">
	</script>
	<script language="javascript" src="js/map/trip.js"></script>
	<script language="javascript" src="js/map/collaborators.js"></script>
	<script language="javascript" src="js/map/interviews.js"></script>
	<script language="javascript" src="js/map/people.js"></script>
	<script language="javascript" src="js/map/photos.js"></script>
	<script language="javascript" src="js/map/videos.js"></script>
	<script language="javascript" src="js/map-style.js"></script>
	<script language="javascript" src="js/map.js"></script>
	<script type="text/javascript" >
		$(function() {
			$('a[name="what"]').hover(
				function() { $('.what').css({'display':'block'}); }
			);
			setUpMap();
		});
	</script>
		
		<!-- Developed by Pepe Doval - http://about.me/pepellou -->
</head>
<body>
	<div id="sheet">
		<img src="img/header.png" />
		<div id="map_canvas"></div>
		<div id="slider">
			<img src="img/road.png" />
		</div>
		<div id="menu">
			<ul>
				<li><a href="#" name="what"> What<strong>is</strong> </a></li>
				<li><a href="#" name="why">  Why    </a></li>
				<li><a href="#" name="who">  Who    </a></li>
				<li><a href="#" name="where">Where  </a></li>
				<li><a href="#" name="how">  How    </a></li>
		</div>
		<img class="what" src="img/lineto-what.png" />
		<div class="box what">
			<div class="left">
				<img src="img/who.png" />
			</div>
			<div class="right">
				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi commodo auctor mattis. 
					Sed sem justo, pretium sit amet mattis ut, ullamcorper mattis libero. 
					Aliquam sit amet felis a urna mattis accumsan ac ac velit. Quisque sem justo, imperdiet 
					tristique sollicitudin sed, scelerisque quis magna. Nunc feugiat consectetur ipsum vitae 
					vulputate. Nulla facilisi. Duis tempus mi vel mauris imperdiet in pellentesque nisi dapibus. 
					Praesent scelerisque magna sit amet nisi ullamcorper posuere congue tortor faucibus. 
					Suspendisse dictum leo non ipsum semper sed varius lectus ullamcorper.
				</p>
				<p>
					Phasellus eros libero, malesuada nec pulvinar sit amet, dapibus sed risus. Quisque pulvinar 
					nibh a nisl convallis ac congue orci mattis. Nam consequat mi et nisi venenatis in ultricies 
					leo ultricies. Nam eu dolor sem. Cras sodales sagittis euismod.
				</p>
				<p>
					Proin nunc orci, scelerisque vel volutpat eget, mattis in mauris. Nulla ut mi vel metus 
					dictum tincidunt. Nam sit amet diam sit amet diam imperdiet scelerisque.
				</p>
			</div>
		</div>
	</div>
</body>
</html>
