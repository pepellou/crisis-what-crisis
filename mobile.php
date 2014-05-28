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
	<img id="bgImage" src="mobil.png" />
	<a href="mailto:projetcrisiswhatcrisis@gmail.com">
		<img id="mailto" src="mailto.png" />
	</a>
	<a href="http://www.youtube.com/watch?v=ln3tGnzGT9k" target="_blank">
		<img id="play_video" src="play_video.png" />
	</a>
    <div style="position: absolute; z-index: -1; color: #aaa;">
        <h1>Crisis what crisis: <?php echo SUBTITLE;?></h2>
        <h2>what</h2>
		<?php echo WHAT;?>
        <h2>why</h2> <p>
		<?php echo WHY;?>
        <h2>who</h2> <p>
		<?php echo WHO;?>
        <h2>where</h2>
		<?php echo WHERE;?>
        <h2>how</h2>
		<?php echo HOW;?>
    </div>
</body>
