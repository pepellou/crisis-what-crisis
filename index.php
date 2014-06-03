<?php
	require_once dirname(__FILE__)."/mobile-detection.php";
	require_once dirname(__FILE__)."/get-videos.php";

	require_once dirname(__FILE__)."/people.php";

    $idioma = isset($_COOKIE['lan']) ? $_COOKIE['lan'] : "";
    $subpag = "";

    if ($idioma == "") {
        $idioma = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
        $idioma = substr($idioma, 0, 2);
    }
    if ($idioma == "es") {
        require_once(dirname(__FILE__)."/langs/es".$subpag.".php");
    }
    elseif ($idioma == "en") {
        require_once(dirname(__FILE__)."/langs/en".$subpag.".php");
    }
    elseif ($idioma == "gl") {
        require_once(dirname(__FILE__)."/langs/gl".$subpag.".php");
    }
    elseif ($idioma == "it") {
        require_once(dirname(__FILE__)."/langs/it".$subpag.".php");
    }
    elseif ($idioma == "el") {
        require_once(dirname(__FILE__)."/langs/el".$subpag.".php");
    }
    elseif ($idioma == "pt") {
        require_once(dirname(__FILE__)."/langs/pt".$subpag.".php");
    }
    elseif ($idioma == "ca") {
        require_once(dirname(__FILE__)."/langs/ca".$subpag.".php");
    }
    echo $idioma;
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
	<title>Crisis - What Crisis: <?php echo SUBTITLE;?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta property="og:image" content="http://www.crisis-whatcrisis.com/img/logo.png" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="http://www.crisis-whatcrisis.com" />
	<meta property="og:title" content="Crisis - What crisis?" />
	<meta property="og:description" content= "<?php echo META_DESCRIPTION;?>"/>
    <meta name="description" content="<?php echo META_DESCRIPTION;?>">
    <meta name="keywords" content="<?php echo META_KEYWORDS?>">
    <meta name="classification" content="Information society, communication, information, audiovisual, telecommunications, public opinion">
    <meta name="language" content="<?php echo META_LANGUAGE;?>">
	<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
	<script type="text/javascript" 
		src="http://maps.googleapis.com/maps/api/js?key=AIzaSyD8VKWnsMR8-zmp5dW7YOInsVjib26h840&sensor=false">
	</script>
	<script>
		people = [
			{
				"type": "people",
				'id': 'fatima_garcia_doval',
				'name': 'XXXX',
				"lat" : "42.884974",
				"lng" : "-8.556708"
			},
			{
				"type": "people",
				'id': 'xavi_gost',
				"name": "Xavi Gost",
				"lat" : "39.488443",
				"lng" : "-0.360331"
			}
		];
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
    <script type="text/javascript">
        $(document).ready(function(){
            $("a[name='idioma_en'],a[name='idioma_es'],a[name='idioma_gl'],a[name='idioma_ca'],a[name='idioma_pt'],a[name='idioma_it'],a[name='idioma_gr']").click(function(event){
                var lang = $(this).attr("name");
                language = lang.substr(lang.length -2, 2);
                var d = new Date();
                var days = 7;
                d.setTime(d.getTime()+(days*24*60*60*1000));

                event.preventDefault();
                document.cookie = "lan=" + language + "; expires=" + d.toGMTString() + "; path=/";
                window.location.href=window.location.href;
            });
        });
    </script>
		
	<!-- Developed by Hermanos Karapatrov - see http://www.crisis-whatcrisis.com/humans.txt -->

</head>
<body>
	<div id="top_block">
		<div id="countdown_dashboard">
			<h1 style="color: white"><?php echo COUNT_DOWN_TITLE;?></h1>
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

		<div class="money" style="margin-top:120px;margin-left:70px;">
		    <h2 style="color:white;margin-bottom:20px"><?php echo MONEY;?></h2>
			<div class="motorbike">
				<img src="img/icon_bikemotor.png" width="43px;">
			</div>
			<div class="km">
				<div class="km_blue"></div>
				<div class="km_yellow"></div>
			</div>
        </div>
		
	</div>

	<div id="idiomas">
		<div style="padding: 0 16px;">
			<a href="" class="<?php echo ($idioma=='en')?'selected':'';?>" name="idioma_en">English</a> |
			<a href="" class="<?php echo ($idioma=='es')?'selected':'';?>" name="idioma_es">Español</a>
			<a href="" class="<?php echo ($idioma=='ca')?'selected':'';?>" name="idioma_ca">Català</a> |
			<a href="" class="<?php echo ($idioma=='gl')?'selected':'';?>" name="idioma_gl">Galego</a> |
			<a href="" class="<?php echo ($idioma=='pt')?'selected':'';?>" name="idioma_pt">Português</a> |
			<a href="" class="<?php echo ($idioma=='it')?'selected':'';?>" name="idioma_it">Italiano</a> |
			<a href="" class="<?php echo ($idioma=='gr')?'selected':'';?>" name="idioma_gr">ελληνικά</a>
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
		<div class="box what"><?php echo WHAT;?></div>
		<img class="line why" src="img/lineto-why.png" alt="line" />
		<div class="box why"><?php echo WHY;?> </div>
		<img class="line who" src="img/lineto-who.png" alt="line" />
		<div class="box who"><?php echo WHO;?> </div>
		<img class="line where" src="img/lineto-where.png" alt="line" />
		<div class="box where"><?php echo WHERE;?> </div>
		<img class="line how" src="img/lineto-how.png" alt="line" />
		<div class="box how"><?php echo HOW;?> </div>
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

	<?php foreach (People::all() as $person) { ?>
		<div id="person_<?php echo $person->id; ?>" class="person modal">
			<img src="data/people_images/<?php echo $person->id; ?>.png"></img>
			<h1>WHO</h1>
			<p class="name"><?php echo $person->name; ?></p>
			<h1>WHERE</h1>
			<p class="location"><?php echo $person->location; ?></p>
			<h1>WHAT</h1>
			<p class="what"><?php echo $person->what; ?></p>
			<h1>WHY</h1>
			<p class="why"><?php echo $person->why; ?></p>
			<h1>HOW</h1>
			<p class="how"><?php echo $person->how; ?></p>
			<h1>WEB</h1>
			<p class="web"><?php echo $person->web; ?></p>
			<h1>MAIL</h1>
			<p class="mail"><?php echo $person->mail; ?></p>
			<h1>LINKS</h1>
			<ul class="links">
			<?php foreach ($person->links as $link) { ?>
				<li><?php echo $link; ?></li>
			<?php } ?>
			</ul>
			<h1>GPS</h1>
			<p class="name"><?php echo $person->gps->lat; ?></p>
			<p class="name"><?php echo $person->gps->lng; ?></p>
		</div>
	<? } ?>

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
