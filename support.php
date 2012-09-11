<?php
	$lan = isset($_GET['lan'])?$_GET['lan']:'en';
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=1280, maximum-scale=1.0" />	
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
	<script language="javascript" src="js/translate-support.js"></script>
</head>
<body>
	<input id="language" type="hidden" value="<?php echo $lan; ?>" />
	<div id="sheet" style="height:1460px">
		<img src="img/header.png" />
		<div id="contact" class="modal">
			<div class="center content">
				<div id="infoContact"></div>
				<div id="contactList"></div>
				<div id="infoPayment"></div>
				<div id="formContact"></div>
				<div id="formDonation"></div>
			</div>
		</div>
	</div>
</body>