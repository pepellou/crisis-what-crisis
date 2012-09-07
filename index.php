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
	<script language="javascript" src="js/collaborate.js"></script>
	<script language="Javascript" type="text/javascript" src="countdown/js/jquery.lwtCountdown-1.0.js"></script>
	<script language="Javascript" type="text/javascript" src="countdown/js/misc.js"></script>
		
	<!-- Developed by Hermanos Karapatrov - see http://www.crisis-whatcrisis.com/humans.txt -->

</head>
<body>
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

	<div id="sheet">
		<img src="img/header.png" />
		<div id="map_canvas"></div>
		<div id="map_cover"></div>
		<img id="collaborate_button" src="img/donate.png" class="donateImg" />
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

	<div id="black-background" class="modal"></div>

	<div id="contact" class="modal">
		<div class="center content">
			<div>
				<h1>Como podes colaborar?</h1>
				<p>Este proxecto vaise financiar de varios xeitos, por 
				un lado o esforzo persoal
				por outro queremos contar coa colaboraci&oacute;n de 
				tod@s aqueles que queirades aportar algo a esta 
				visi&oacute;n diferente dende os PIGS.</p>
				<p>P&oacute;dese colaborar destos xeitos:</p>
			</div>
			<ul>
				<li>
					<div>
						<img src="img/icon-fuel">
						<span>Combustible. Cada 20 &euro; recorro 180 km.</span>
					</div>
				</li>
				<li>
					<div>
						<img src="img/icon-food">
						<span>Comida. Men&uacute; do d&iacute;a 10 &euro; + cea 8 &euro;</span>
					</div>
				</li>
				<li>
					<div>
						<img src="img/icon-sleep">
						<span>Dormida. Un lugar onde pasar a noite </span>
					</div>
				</li>
				<li>
					<div>
						<img src="img/icon-camera">
						<span>Contando a t&uacute;a historia &aacute; c&aacute;mara</span>
					</div>
				</li>
				<li>
					<div>
						<img src="img/icon-person">
						<span>Co&ntilde;ezo a algu&eacute;n que pode colaborar dalgunha das formas anteriores</span>
					</div>
				</li>
				<li>
					<div>
						<img src="img/icon-talk">
						<span>Difundindo o proxecto</span>
					</div>
				</li>
			</ul>
			<div id="formContact">
				<h2>Contacta con n&oacute;s</h2>
				<form name="contact" method="post">
					<div class="formLine"><span>Nombre:</span><input name="contant-name"></input></div>
					<div class="formLine"><span>Telf:</span><input name="contant-phone"></input></div>
					<div class="formLine"><span>Email:</span><input name="contant-email"></input></div>
					<div class="formLine"><span>Comentario:</span><textarea name="contant-comment"></textarea></div>
					<div class="formLine"><span>&nbsp;</span><input type="submit" value="Quero colaborar" name="contant-button"></input></div>
				</form>
			</div>
			<div>
				<h2>Ou fai unha donaci&oacute;n:</h2>
				<form class="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
					<input type="hidden" name="cmd" value="_donations">
					<input type="hidden" name="business" value="xavierbelho@xavierbelho.com">
					<input type="hidden" name="currency_code" value="EUR">
					<input type="hidden" name="lc" value="ES">
					<input type="hidden" name="item_name" value="Crisis What Crisis">
					<input type="hidden" name="no_note" value="0">
					<input type="hidden" name="bn" value="PP-DonationsBF:btn_donateCC_LG.gif:NonHostedGuest">
					<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal. La forma rápida y segura de pagar en Internet.">
					<img alt="" border="0" src="https://www.paypalobjects.com/es_ES/i/scr/pixel.gif" width="1" height="1">
				</form>
			</div>
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
</body>
</html>
