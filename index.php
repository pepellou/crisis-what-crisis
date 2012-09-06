<?php
	require_once dirname(__FILE__)."/mobile-detection.php";

	function getVideos(
		$user,
		$tag
	) {
		$selected_videos = array();
		$xml = file_get_contents(
			"https://gdata.youtube.com/feeds/api/users/{$user}/uploads"
		);
		$xml = preg_replace('/(<|<\/)([a-z0-9]+):/i','$1$2_',$xml);
		$videos = simplexml_load_string($xml);
		foreach ($videos->entry as $video) {
			$current_video = array();
			$current_video["title"] = $video->title;
			foreach ($video->link as $link) {
				$attributes = $link->attributes();
				if ($attributes->rel == "alternate") {
					$current_video['link'] = $attributes->href;
				}
			}
			if (isset($video->georss_where)) {
				$position = $video->georss_where->gml_Point->gml_pos;
				list($current_video["lat"], $current_video["lng"]) = (explode(" ", $position));
			}
			foreach ($video->category as $category) {
				$attributes = $category->attributes();
				if ($attributes->scheme == "http://gdata.youtube.com/schemas/2007/keywords.cat") {
					if ($attributes->term == $tag) {
						$selected_videos[]= $current_video;
					}
				}
			}
		}
		return $selected_videos;
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=1280, maximum-scale=1.0" />	
	<!-- <base href = "http://www..com/" > -->
	<link href="css/fonts.css" media="screen" rel="stylesheet" type="text/css" >
	<link href="css/style.css" media="screen" rel="stylesheet" type="text/css" >
	<link rel="icon" type="image/png" href="favicon.png">
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
	<script language="javascript" src="js/map/people.js"></script>
	<script language="javascript" src="js/map/photos.js"></script>
	<script language="javascript" src="js/map/videos.js"></script>
	<script language="javascript" src="js/map-style.js"></script>
	<script language="javascript" src="js/map.js"></script>
		
		<!-- Developed by Pepe Doval - http://about.me/pepellou -->
</head>
<body>
	<div id="paypal" class="center">
		<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
			<input type="hidden" name="cmd" value="_donations">
			<input type="hidden" name="business" value="xavierbelho@xavierbelho.com">
			<input type="hidden" name="currency_code" value="EUR">
			<input type="hidden" name="lc" value="ES">
			<input type="hidden" name="item_name" value="Crisis What Crisis">
			<input type="hidden" name="no_note" value="0">
			<input type="hidden" name="bn" value="PP-DonationsBF:btn_donateCC_LG.gif:NonHostedGuest">
			<input type="image" src="img/donate.png" border="0" name="submit" class="donateImg" alt="PayPal. La forma rápida y segura de pagar en Internet.">
			<img alt="" border="0" src="https://www.paypalobjects.com/es_ES/i/scr/pixel.gif" width="1" height="1">
		</form>
	</div>
	<div id="sheet">
		<img src="img/header.png" />
		<div id="map_canvas"></div>
		<div id="map_cover"></div>
		<div id="slider">
			<img src="img/road.png" />
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
		<div class="box what">
			<p>
				It's a documentary portraying the 2012's Europe.
			</p>
			<p>
				A trip from Galicia, in the Iberian Peninsula's Northwest extreme, 
				to the Pireo in Greece, across Portugal, Spain and Italy (PIGS)*.
				It's a critical eye to the crisis.
			</p>
			<p>
				A practical and brave answer to that questions we should ask:<br/>
				What is the crisis? <br/>
				Where does it come from?<br/>
				Where does it lead us? <br/>
				And now what?
			</p>
		</div>
		<img class="line why" src="img/lineto-why.png" />
		<div class="box why">
			<p>
				The crisis that was a deceleration and now seems an hecatomb
				had to last two years and it'll make six. We don't see the light
				at the end of the tunnel, and if we saw it we would think that
				it's the train coming to finish us.
			</p>
			<p>
				The degree of collective pessimism gripping us is more desperate
				and immobilizer than financial imponderables. We have fear, and as
				british sociologist Frank Furedi said long before the crisis arose,
				ubiquitous and persistent fear generates doom and resignation.
			</p>
			<p>
				We need to visualize alternative answers, other possible futures,
				because if we don't imagine them, we will never be able to make
				them happen.
			</p>
		</div>
		<img class="line who" src="img/lineto-who.png" />
		<div class="box who">
			<p>
				Graphical and audiovisual creator Xavier Belho leads the motorbike 
				and the camera.
			</p>
			<p>
				Accompanying him from Galicia, Irmáns Karapatrov and the collective NóComún.
			</p>
			<p>
				And along the way he will be meeting the main characters of this story:
				PIGS inhabitants that refuse to see themselves reflected in the 
				hopelessness mirror and face the crisis with courage and geat ideas.
			</p>
		</div>
		<img class="line where" src="img/lineto-where.png" />
		<div class="box where">
			<p>
				<strong>Entrepreneur</strong> .- Person who undertakes, with determination,
				hard actions.
			</p>
			<p>
				There where there is an intelligent answer to the crisis.
			</p>
			<p>
				The route will be set by the main characters along the four countries.
			</p>
		</div>
		<img class="line how" src="img/lineto-how.png" />
		<div class="box how">
			<p>
				Videobooth style microinterviews with each one of the main characters, 
				who will present their projects where they are developing them. They will
				be recorded with a Canon 7D and a mobile phone.
			</p>
			<p>
				They will be uploaded to the Web and Social networks, thus building an
				interactive map of the trip. Each stage will be posted on the Web almost
				realtime.
			</p>
			<p>
				At the end, a documentary will be built from all the recorded material.
			</p>
		</div>
	</div>

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

	<script type="text/javascript" >
		function addPhoto(
			photo
		) {
			photos.push({ 
				name: photo.title, 
				lat: photo.lat,
				lng: photo.lng,
				type: "photos",
				url: photo.link
			});
		}

		$(function() {
			$('a[name="what"]').hover(
				function() { 
					$('.line').css({'display':'none'}); 
					$('.box').css({'display':'none'}); 
					$('.what').css({'display':'block'}); 
				}
			);
			$('a[name="why"]').hover(
				function() { 
					$('.line').css({'display':'none'}); 
					$('.box').css({'display':'none'}); 
					$('.why').css({'display':'block'}); 
				}
			);
			$('a[name="who"]').hover(
				function() { 
					$('.line').css({'display':'none'}); 
					$('.box').css({'display':'none'}); 
					$('.who').css({'display':'block'}); 
				}
			);
			$('a[name="where"]').hover(
				function() { 
					$('.line').css({'display':'none'}); 
					$('.box').css({'display':'none'}); 
					$('.where').css({'display':'block'}); 
				}
			);
			$('a[name="how"]').hover(
				function() { 
					$('.line').css({'display':'none'}); 
					$('.box').css({'display':'none'}); 
					$('.how').css({'display':'block'}); 
				}
			);

			setUpMap();
			var fadeMap = setInterval(
				function () {
					var theOpacity = $('#map_cover').css('opacity');
					if (theOpacity < 0.02) {
						$('#map_cover').css('display', 'none');
						clearInterval(fadeMap);
					} else {
						$('#map_cover').css('opacity', theOpacity - 0.01);
					}
				},
				10
			);

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
	</script>
</body>
</html>
