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
	<meta property="og:description" content= "It's a documentary portraying the 2012's Europe. A trip from Galicia, in the Iberian Peninsula's Northwest extreme, to the Pireo in Greece, across Portugal, Spain and Italy (PIGS)*.  It's a critical eye to the CRISIS. A practical and brave answer to that questions we should ask: What is the crisis? Where does it come from? Where does it lead us? AND NOW WHAT?" />
    <meta name="description" content="It's a documentary portraying the 2012's Europe. A trip from Galicia, in the Iberian Peninsula's Northwest extreme, to the Pireo in Greece, across Portugal, Spain and Italy (PIGS)*.  It's a critical eye to the CRISIS. A practical and brave answer to that questions we should ask: What is the crisis? Where does it come from? Where does it lead us? AND NOW WHAT?"> 
    <meta name="keywords" content="crisis, what crisis, pigs, P.I.G.S."> 
    <meta name="classification" content="Information society, communication, information, audiovisual, telecommunications, public opinion"> 
    <meta name="language" content="en, english"> 
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
	<script language="Javascript" src="js/people.js"></script>
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
				<div class="digit">0</div>
				<div class="digit">0</div>
			</div>

			<div class="dash days_dash">
				<span class="dash_title">days</span>
				<div class="digit">0</div>
				<div class="digit">9</div>
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

		<div class="money" style="margin-top:120px;margin-left:70px"></div>
		
	</div>

	<div id="idiomas">
		<div style="padding: 0 16px;">
			<a href="#" class="selected" name="idioma_en">english</a> |
			<a href="#" name="idioma_gl">galego</a> |
			<a href="#" name="idioma_es">espa&ntilde;ol</a>
		</div>
	</div>
	<div id="sheet">
		<img src="img/header.png" alt="Web logo: Crisis What Crisis - An optimistic answer"/>
		<div id="map_canvas"></div>
		<div id="map_cover"></div>
		<img id="collaborate_button" src="img/donate_ing.png" alt="support" class="donateImg" />
		<div id="slider">
			<img width="1200px" style="margin-top: -285px;" src="http://farm9.staticflickr.com/8036/7969876764_9d76db9536_b.jpg" alt="motorbike license plate with the web logo on it" />
		</div>
		<div id="menu">
			<ul>
				<li><a href="#" name="what">  What  </a></li>
				<li><a href="#" name="why">   Why   </a></li>
				<li><a href="#" name="who">   Who   </a></li>
				<li><a href="#" name="where"> Where </a></li>
				<li><a href="#" name="how">   How   </a></li>
		</div>
		<img class="line what" src="img/lineto-what.png" alt="line" />
		<div class="box what"> </div>
		<img class="line why" src="img/lineto-why.png" alt="line" />
		<div class="box why"> </div>
		<img class="line who" src="img/lineto-who.png" alt="line" />
		<div class="box who"> </div>
		<img class="line where" src="img/lineto-where.png" alt="line" />
		<div class="box where"> </div>
		<img class="line how" src="img/lineto-how.png" alt="line" />
		<div class="box how"> </div>
	</div>

	<div id="black-background" class="modal"></div>

	<div id="videos">
	<?php 	foreach (getVideos("anajimandro", "CRISIS") as $video) { ?>
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

	<div id="people" class="modal">
		<div class="logo"><img src="img/logo.png" alt="small web logo"></div>
		<div class="photo"></div>
		<div class="table-left">
			<div class="web"></div>
			<div class="links">links: </div>
			<div class="contact"></div>
		</div>
		<div class="table-right">
			<div class="who">
				<h1>WHO</h1>
				<div class="text">&nbsp;</div>
			</div>
			<div class="where">
				<h1>WHERE</h1>
				<div class="text">&nbsp;</div>
			</div>
			<div class="what">
				<h1>WHAT</h1>
				<div class="text">&nbsp;</div>
			</div>
			<div class="why">
				<h1>WHY</h1>
				<div class="text">&nbsp;</div>
			</div>
			<div class="how">
				<h1>HOW</h1>
				<div class="text">&nbsp;</div>
			</div>
		</div>
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
			var freeze = true;
			if (!freeze) {
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
			}
		});
	</script>

	<div id="footer">
		<div class="mountains"></div>
		<div class="things"></div>
		<div class="road"></div>
		<div class="moto"></div>
		<div style="width: 100%; background: black; float: left; padding-bottom: 20px;">
			<div class="ground">
				<div class="block" style="width:285px">
					<div id="sponsorButtons">
					<p class="title">SPONSORS</p>
						<section style="margin-left:40px">
							<div class="crechas">
								<a href="http://www.casadascrechas.com/central/080409joomla" target="blank">
									<span class="crechas"></span>
								</a>
							</div>
							<div class="canefano">
								<a href="http://www.casadascrechas.com/central/080409joomla" target="blank">
									<span class="canefano"></span>
								</a>
							</div>
							<div class="tattoo">
								<a href="http://www.behance.net/xavierbelho" target="blank">
									<span class="tattoo"></span>
								</a>
							</div>
							<div class="agilaz">
								<a href="http://www.agil-az.com" target="blank">
									<span class="agilaz"></span>
								</a>
							</div>
							<div class="karapatrov">
								<a href="http://www.karapatrov.com" target="blank">
									<span class="karapatrov"></span>
								</a>
							</div>
						</section>
					</div>
				</div>
				<div class="block" style="width:190px">
					<div id="contributorsButtons">
						<p class="title">CONTRIBUTORS</p>
						<ul>
							<li>Francho Joven Araus</li>
							<li>Pepe Doval</li>
							<li>Camabou</li>
							<li>Adri&aacute;n Moreno Pe&ntilde;a</li>
							<li>Gonzalo Su&aacute;rez</li>
							<li>Jorge Garc&iacute;a</li>
							<li>Eviroula Dourou</li>
							<li><a target="_blank" href="http://www.dirtysocks.es/" style="color: white;">Dirty Socks</a></li>
							<li>Maurizio Galli</li>
						</ul>
					</div>
				</div>
				<div class="block" style="width:190px">
					<div id="hostsButtons">
						<p class="title">HOSTS</p>
						<ul>
							<li>Carlos Garc&iacute;a Garc&iacute;a</li>
						</ul>
					</div>
				</div>
				<div class="block" style="float:right;">
					<p class="title">DOSSIER</p>
					<div style="margin-left:40px;margin-right:40px">
						<object>
							<param name="movie" value="http://static.issuu.com/webembed/viewers/style1/v2/IssuuReader.swf?mode=mini&amp;embedBackground=%23000000&amp;backgroundColor=%23222222&amp;documentId=120917102501-50fad23ffff54f8f99dca6d42d4c6aab" />
							<param name="allowfullscreen" value="true"/>
							<param name="menu" value="false"/>
							<param name="wmode" value="transparent"/>
							<embed src="http://static.issuu.com/webembed/viewers/style1/v2/IssuuReader.swf" type="application/x-shockwave-flash" allowfullscreen="true" menu="false" wmode="transparent" flashvars="mode=mini&amp;embedBackground=%23000000&amp;backgroundColor=%23222222&amp;documentId=120911185036-2adc3ed03adc429ba9f572db6189c3b5" />
						</object>
						<div style="width: 100%;text-align:center;font-size:12px">
							<a href="http://issuu.com/xavierbelho7/docs/crisiswhatcrisis1?mode=window&amp;backgroundColor=%23222222" target="_blank" style="color: white;">Open publication</a> - Free <a href="http://issuu.com" target="_blank" style="color: white;">publishing</a> - <a href="http://issuu.com/search?q=crisis" target="_blank" style="color: white;">More crisis</a></div>
					</div>
				</div>
				<div id="socialButtons">
					<div class="google">
						<a href="https://plus.google.com/106162106682797002853" rel="publisher" target="blank">
							<span class="google"></span>
						</a>
					</div>
					<div class="twitter">
						<a href="http://www.twitter.com/crisisWcrisis" target="blank">
							<span class="twitter"></span>
						</a>
					</div>
					<div class="facebook">
						<a href="http://www.facebook.com/crisiswcrisis" target="blank">
							<span class="facebook"></span>
						</a>
					</div>
				</div>
				<div id="formContact" style="float: left">
					<p class="title">Contact us:</p>
					<p style="margin-left: 40px">
						<a href="mailto:projetcrisiswhatcrisis@gmail.com" style="color:white; font-size:14px">projetcrisiswhatcrisis@gmail.com</a>
					</p>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-22545594-5']);
		_gaq.push(['_trackPageview']);
		(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
	</script>
</body>
</html>
