<?php
	$lan = isset($_GET['lan'])?$_GET['lan']:'en';

	if (isset($_POST['contact-button'])) {
		if (isset($_POST['contact-name']) &&
			isset($_POST['contact-phone']) &&
			isset($_POST['contact-email']) &&
			isset($_POST['contact-comment']) &&
			isset($_POST['contact-language'])) {
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= "From: info@galdoo.com\r\n" 
				."Reply-To: no-reply@galdoo.com\r\n" 
				."X-Mailer: PHP/".phpversion();
			if (mail("project@crisis-whatcrisis.com",
				"Crisis What Crisis",
				"<h1>Nombre: ".$_POST['contact-name']."</h1><br>".
				"<h2>Telf: ".$_POST['contact-phone']."</h2><br>".
				"<h2>Email: ".$_POST['contact-email']."</h2><br>".
				"<h2>Idioma: ".$_POST['contact-language']."</h2><br><br>".
				"<h1>Comentario: ".$_POST['contact-comment']."</h1>",
				$headers
			)) {
			?>
	<div class="responseMail">
		<div class="textMail">
			Hemos enviado su mensaje.<br>
			En breve nos pondremos en contacto.<br>
			Gracias.
		</div>
		<p class="buttonClose">Cerrar</p>
	</div>
			<?php
			} else {
			?>
	<div class="responseMail">
		<div class="textMail">
			No hemos podido enviar el mensaje.<br>
			Por favor int&eacute;ntelo m&aacute;s tarde.<br>
			Gracias.
		</div>
		<p class="buttonClose">Cerrar</p>
	</div>
			<?php
			};
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=1280, maximum-scale=1.0" />	
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
	<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
	<script language="Javascript" src="js/money.js"></script>
	<script language="javascript" src="js/translate-support.js"></script>
	<script language="Javascript" type="text/javascript" src="js/jqBarGraph.1.1.min.js"></script>
</head>
<body>
	<input id="language" type="hidden" value="<?php echo $lan; ?>" />
	<div id="idiomas">
		<a href="#" class="selected" name="idioma_en">english</a> |
		<a href="#" name="idioma_gl">galego</a> |
		<a href="#" name="idioma_es">espa&ntilde;ol</a>
	</div>
	<div id="sheet" style="height:1200px">
		<img src="img/header.png" />
		<div id="contact" class="modal">
			<div style="float:left;width:100%">
				<div style="float:left;width:50%;margin-left:45px">
					<div id="infoContact"></div>
					<div id="contactList"></div>
				</div>
				<div id="formContact" style="float:right"></div>
			</div>
			<div style="float:left">
				<div id="formDonation"></div>
			</div>
			<div style="float:left;width:100%">
				<div id="infoPayment" style="float:left"></div>
				<div style="float:right;margin-right:85px;margin-top:30px">
					<div id="money"></div>
				</div>
			</div>
		</div>
	</div>
</body>