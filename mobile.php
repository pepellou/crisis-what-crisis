<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=1280, maximum-scale=1.0" />	
	<!-- <base href = "http://www..com/" > -->
	<link href="css/fonts.css" media="screen" rel="stylesheet" type="text/css" >
	<link href="css/mobile.css" media="screen" rel="stylesheet" type="text/css" >
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
	<script language="javascript" src="js/map-mobile.js"></script>
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
		<div id="main_menu">
			<div class="control">
				<div class="box" title="Show videos">
					<a href="#theMap"><div class="link">VIDEOS</div></a>
				</div>
			</div>
			<div class="control">
				<div class="box" title="Show photos">
					<a href="#theMap"><div class="link">PHOTOS</div></a>
				</div>
			</div>
			<div class="control">
				<div class="box" title="Show people">
					<a href="#theMap"><div class="link">PEOPLE</div></a>
				</div>
			</div>
			<div class="control">
				<div class="box highlight" title="About this project">
					<a href="#about"><div class="link">ABOUT</div></a>
				</div>
			</div>
			<div class="control">
				<div class="box" title="Show interviews">
					<a href="#theMap"><div class="link">INTERVIEWS</div></a>
				</div>
			</div>
			<div class="control">
				<div class="box" title="Show collaborators">
					<a href="#theMap"><div class="link">COLLABORATORS</div></a>
				</div>
			</div>
			<div class="control">
				<div class="box" title="Show trip stops">
					<a href="#theMap"><div class="link">TRIP</div></a>
				</div>
			</div>
		</div>
		<div style="width: 100%; height: 100px;"></div>
		<img src="img/header-320.png" />
		<a name="theMap" class="anchor"></a>
		<div id="map_canvas"></div>
		<a name="about" class="anchor"></a>
		<div class="about">
			<h1>About this project</h1>
			<ul>
				<li><a href="#" name="what"> What<strong>is</strong> </a></li>
				<li><a href="#" name="why">  Why    </a></li>
				<li><a href="#" name="who">  Who    </a></li>
				<li><a href="#" name="where">Where  </a></li>
				<li><a href="#" name="how">  How    </a></li>
			</ul>
		</div>
	</div>
</body>
</html>
