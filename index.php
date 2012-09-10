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
	<script language="javascript" src="js/translate.js"></script>
	<script language="Javascript" type="text/javascript" src="countdown/js/jquery.lwtCountdown-1.0.js"></script>
	<script language="Javascript" type="text/javascript" src="countdown/js/misc.js"></script>
	<script language="Javascript" type="text/javascript" src="js/jqBarGraph.1.1.min.js"></script>
	<script language="Javascript">
		$(function() {
			var money = new Array(
				[2500, '€ Estimated', '#2c4390'],
				[380,  '€ Collected so far', '#666']
			);
			$('#money').jqBarGraph({
				data: money,
				colors: ['#2c4390'] ,
				showValuesColor: '#2c4390',
				width: 300,
				height: 280
			});
		});
	</script>
	<style>
		#money {
			margin-top: 25px;
		}
		#graphValue0money, #graphValue1money { 
			color: white;
			font-weight: bold;
			margin-bottom: 5px;
		}
		.graphLabelmoney, .legendLabelmoney {
			color: white;
			font-weight: bold;
		}
		.graphLabelmoney {
			margin-top: 10px;
		}
	</style>
		
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
		<img id="collaborate_button" src="img/donate_ing.png" class="donateImg" />
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

	<div id="contact" class="modal">
		<div class="center content">
			<div id="infoContact"></div>
			<div id="contactList"></div>
			<div id="infoPayment"></div>
			<div id="formContact"></div>
			<div id="formDonation"></div>
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
					<p>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ac orci a urna dictum luctus vel at enim. Cras dictum quam et lectus suscipit vulputate. Nullam est dui, venenatis vitae aliquam ac, suscipit id erat. Nullam felis erat, porta euismod dignissim vitae, ornare quis elit. Curabitur et interdum purus. Aenean consectetur arcu eget eros viverra nec vehicula justo congue. In tempor, risus a elementum gravida, sapien quam euismod nisl, at lacinia dolor turpis vel augue. Nam erat diam, congue eu elementum non, cursus vitae lectus.
					</p>
					<p>
						Fusce gravida dui vel erat lobortis id dictum velit blandit. Cras id lacus lorem. Nullam nec mauris urna, et pellentesque orci. Donec eleifend feugiat quam, sit amet varius metus posuere sed. Nullam facilisis, odio non hendrerit mollis, justo eros lacinia arcu, vel ornare augue lacus ac ligula. Integer aliquam nisl vitae mauris ornare interdum. Sed vehicula purus et felis elementum nec lacinia tortor ultrices.
					</p>
				</div>
				<div class="block">
					<p>
						Praesent ullamcorper euismod lacus, quis gravida eros suscipit ut. Pellentesque malesuada, mauris sed porttitor interdum, urna ipsum dapibus lorem, vitae condimentum mi lacus id justo. Sed a faucibus leo. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Etiam vitae ornare mauris. Cras eget velit sed justo molestie vehicula. Curabitur dignissim neque sit amet nunc blandit viverra. Suspendisse potenti. Cras velit ante, scelerisque vel semper ac, rutrum eget augue. Proin semper euismod sagittis.
					</p>
					<p>
						Mauris adipiscing mollis tortor id ultrices. Aenean interdum auctor felis, non aliquam nibh tincidunt ut. Aenean mauris dui, pulvinar eu eleifend eleifend, vehicula ac dui. Donec posuere, nisl sit amet elementum mattis, ante diam euismod purus, iaculis fermentum orci turpis eget lorem. Maecenas pharetra aliquam diam, a imperdiet purus laoreet eu. Mauris placerat augue ac lorem condimentum eget tristique mauris iaculis. Ut congue blandit est ac bibendum.
					</p>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
