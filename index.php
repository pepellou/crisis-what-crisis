<?php
    require_once dirname(__FILE__)."/mobile-detection.php";
    require_once dirname(__FILE__)."/get-videos.php";

    require_once dirname(__FILE__)."/people.php";

    $languages = array(
        'English' => 'en',
        'Español' => 'es',
        //'Català' => 'ca',
        'Galego' => 'gl',
        //'Português' => 'pt',
        //'Italiano' => 'it',
        //'ελληνικά' => 'gr'
    );

    $idioma = isset($_COOKIE['lan']) ? $_COOKIE['lan'] : "";
    if ($idioma == "") {
        $idioma = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
    }
    $idioma = substr($idioma, 0, 2);
    if (in_array($idioma, $languages)) {
        require_once(dirname(__FILE__).'/langs/'.$idioma.'.php');
    } else {
        require_once(dirname(__FILE__).'/langs/en.php');
    }
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
    <link href="css/cookies.css" media="screen" rel="stylesheet" type="text/css" >
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
    <script language="javascript" src="js/cookies.js"></script>
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyD8VKWnsMR8-zmp5dW7YOInsVjib26h840&sensor=false">
    </script>
    <script>
        people = [
            <?php foreach (People::all() as $person) { ?>
                {
                    'type': 'people',
                    'id': '<?php echo $person->id; ?>',
                    'name': '<?php echo $person->name; ?>',
                    'lat' : '<?php echo $person->gps->lat; ?>',
                    'lng' : '<?php echo $person->gps->lng; ?>'
                },
            <?php } ?>
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
        if (window.$) {
            $(function() {
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
        }
    </script>
    <script type="text/javascript">var switchTo5x=true;</script>
    <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
    <script type="text/javascript">stLight.options({publisher: "ur-f97ca0-e046-8744-a2ac-c443671fe277", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
    <!-- Developed by Hermanos Karapatrov - see http://www.crisis-whatcrisis.com/humans.txt -->
</head>

<body>
    <div class="centered">
    <div id="goteo">
        <h1>Support us!</h1>
        <iframe frameborder="0" height="480px" src="https://goteo.org/widget/project/crisis-what-crisis" width="250px" scrolling="no"></iframe>
    </div>
    <div class="wrapper-content">
    <div id="shareThis">
        <span class='st_sharethis_large' displayText='ShareThis'></span>
        <span class='st_facebook_large' displayText='Facebook'></span>
        <span class='st_twitter_large' displayText='Tweet'></span>
        <span class='st_pinterest_large' displayText='Pinterest'></span>
        <span class='st_googleplus_large' displayText='Google +'></span>
        <span class='st_email_large' displayText='Email'></span>
    </div>

    <div class="cookies" id="cookiebox" style="display: <?php if ($_COOKIE["cookie"]=="true") echo "none" ?>"> <?php echo COOKIE_INFO;?> </div>
    <div id="idiomas">
        <div style="padding: 0 16px;">
            <?php
                $lang_links = array();
                foreach($languages as $name => $code) { 
                    $class = ($idioma==$code) ? 'selected' : '';
                    $lang_links []= "<a href='' class='$class' name='idioma_$code'>$name</a>";
                }
                echo implode(' | ', $lang_links);
            ?>
        </div>
    </div>
    <div id="sheet">
        <img id="header_image" src="img/header.png" alt="Web logo: Crisis What Crisis - An optimistic answer"/>
        <div id="map_canvas"></div>
        <div id="map_cover"></div>
        <a id="roadmap_button" href="roadmap.php"><img src="img/roadmaplink.png" alt="support" class="roadmap_link" /></a>
        <div id="menu">
            <ul>
                <li><a href="javascript:void(0)" name="what">  What  </a></li>
                <li><a href="javascript:void(0)" name="why">   Why   </a></li>
                <li><a href="javascript:void(0)" name="who">   Who   </a></li>
                <li><a href="javascript:void(0)" name="where"> Where </a></li>
                <li><a href="javascript:void(0)" name="how">   How   </a></li>
        </div>
        <div id="main_content">
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
    </div>

    <div id="black-background" class="modal"></div>

    <div id="videos">
        <?php foreach (getVideos("anajimandro", "CRISIS") as $video) { ?>
            <div class="video">
                <div name="title"><?php echo $video['title']; ?></div>
                <div name="link"><?php echo $video['link']; ?></div>
                <div name="gps">
                    <div name="lat"><?php echo $video['lat']; ?></div>
                    <div name="lng"><?php echo $video['lng']; ?></div>
                </div>
            </div>
        <?php } ?>
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
            <p class="web"><a href="<?php echo $person->web; ?>" target="_blank"><?php echo $person->web; ?></a></p>
            <?php if ($person->mail != 'no-mail') { ?>
                <h1>MAIL</h1>
                <p class="mail"><a href="mailto:<?php echo $person->mail; ?>"><?php echo $person->mail; ?></a></p>
            <?php } ?>
            <?php if (count($person->links) > 0) { ?>
                <h1>LINKS</h1>
                <ul class="links">
                <?php foreach ($person->links as $link) { ?>
                    <li><a href="<?php echo $link; ?>" target="_blank"><?php echo $link; ?></a></li>
                <?php } ?>
                </ul>
            <?php } ?>
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
        if (window.$) {
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
        }
    </script>

    <div class="credits">
        <div class="ground">
            <p class="title">CONTRIBUTORS</p>
            <div class="" id="contributorsButtons">
                <ul>
                    <li>Francho Joven Araus</li>
                    <li>Pepe Doval</li>
                    <li>Camabou</li>
                    <li>Adri&aacute;n Moreno Pe&ntilde;a</li>
                    <li>Gonzalo Su&aacute;rez</li>
                    <li>Jorge Garc&iacute;a</li>
                    <li>Eviroula Dourou</li>
                    <li><a target="_blank" href="http://www.dirtysocks.es/">Dirty Socks</a></li>
                    <li>Maurizio Galli</li>
                </ul>
            </div>
            <p class="title">HOSTS</p>
            <div class="" id="hostsButtons">
                <ul>
                    <li>Carlos Garc&iacute;a Garc&iacute;a</li>
                </ul>
            </div>
        </div>
    </div>
    </div>
    </div>
    <div id="footer">
        <div class="mountains"></div>
        <div class="things"></div>
        <div class="road"></div>
        <div class="moto"></div>
        <div class="footerlinks">
            <div class="ground">
                <div class="block3">
                    <p class="title">SPONSORS</p>
                    <section id="sponsorButtons">
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
                            <a href="javascript:void(0)">
                                <span class="karapatrov"></span>
                            </a>
                        </div>
                    </section>
                </div>
                <div class="block3">
                    <p class="title" style="color: black;">DOSSIER</p>
                    <div class="text-center" style="display: none;">
                        <object height="100">
                            <param name="movie" value="http://static.issuu.com/webembed/viewers/style1/v2/IssuuReader.swf?mode=mini&amp;embedBackground=%23000000&amp;backgroundColor=%23222222&amp;documentId=120917102501-50fad23ffff54f8f99dca6d42d4c6aab" />
                            <param name="allowfullscreen" value="true"/>
                            <param name="menu" value="false"/>
                            <param name="wmode" value="transparent"/>
                            <embed src="http://static.issuu.com/webembed/viewers/style1/v2/IssuuReader.swf" type="application/x-shockwave-flash" allowfullscreen="true" menu="false" wmode="transparent" flashvars="mode=mini&amp;embedBackground=%23000000&amp;backgroundColor=%23222222&amp;documentId=120911185036-2adc3ed03adc429ba9f572db6189c3b5" />
                        </object>
                        <p class="text-center">
                                <a href="http://issuu.com/xavierbelho7/docs/crisiswhatcrisis1?mode=window&amp;backgroundColor=%23222222" target="_blank">Open publication</a> - Free <a href="http://issuu.com" target="_blank">publishing</a> - <a href="http://issuu.com/search?q=crisis" target="_blank">More crisis</a>
                        </p>
                    </div>
                </div>
                <div class="block3">
                    <p class="title">CONTACT US:</p>
                    <div id="socialButtons">
                        <div class="google">
                            <a href="https://plus.google.com/+Crisiswhatcrisis2014" rel="publisher" target="blank">
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
                    <p class="text-center">
                        <a href="mailto:team@crisis-whatcrisis.com">team@crisis-whatcrisis.com</a>
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
