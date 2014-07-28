<?php
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
?>
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
	<!-- Developed by Pepe Doval - http://about.me/pepellou -->
</head>
<body>
	<img id="bgImage" src="mobil_header.png" />
    <div class="header">
        <h2>what</h2>
        <a href="http://www.youtube.com/watch?v=ln3tGnzGT9k" target="_blank">
            <img id="play_video" src="play_video.png" />
        </a>
    </div>
    <div class="content">
        <?php echo WHAT;?>
    </div>
    <h2>why</h2> <p>
    <div class="content">
        <?php echo WHY;?>
    </div>
    <h2>who</h2> <p>
    <div class="content">
        <?php echo WHO;?>
    </div>
    <h2>where</h2>
    <div class="content">
        <?php echo WHERE;?>
    </div>
    <h2>how</h2>
    <div class="content">
        <?php echo HOW;?>
    </div>
    <footer>
        <p>
            <?php echo CONTACT;?>
            <a href="mailto:team@crisis-whatcrisis.com">team@crisis-whatcrisis.com</a>
        </p>
    </footer>
</body>
