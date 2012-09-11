var translations = {
	"en": { 
		infoContact: '<h1>How can you help?</h1>\
			<p>The project can’t be made without your help.\
			With this campaign I hope to cover the basic costs\
			needed for such a project, which are: fuel, videographic\
			materials, production of the final documentary and share\
			with collaborators and general audience.\
			</p>\
			<p>It can work in these ways:</p>',
		contactList: '<ul>\
						<li>\
							<div>\
								<img src="img/icon-talk">\
								<span>If you tell your story, you\'ll have your little corner in the web \
								as "people", with contact information (if you want)\
								to spread your proposal \
								</span>\
							</div>\
						</li>\
						<li>\
							<div>\
								<img src="img/icon-sleep">\
								<span>If you offer a place to spend the night and/or food aid \
								(either in food or with 10 euros), you\'ll be included in the credits \
								as "hosts"\
								</span>\
							</div>\
						</li>\
						<li>\
							<div>\
								<img src="img/icon-fuel">\
								<span>If you offer fuel or 20 euros, you\'ll be included as "contributors"\
								</span>\
							</div>\
						</li>\
					</ul>',
		infoPayment: '<img class="icon" src="img/icon-battery">\
				<h2>Providing</h2>\
				<img id="supportTable" src="img/support-table-en.png" />\
				<div>\
					<h6>If you want to otherwise participate in the project, please contact us</h6>\
				</div>',
		formContact: '<h2>Contact us</h2>\
				<form name="contact" method="post">\
					<div class="formLine"><span>Name:</span><input name="contant-name"></input></div>\
					<div class="formLine"><span>Phone:</span><input name="contant-phone"></input></div>\
					<div class="formLine"><span>Mail:</span><input name="contant-email"></input></div>\
					<div class="formLine"><span>Comment:</span><textarea name="contant-comment"></textarea></div>\
					<div class="formLine"><span>&nbsp;</span><input type="submit" value="I want to collaborate" name="contant-button"></input></div>\
				</form>',
		formDonation: '<h2>Or make a donation:</h2>\
				<form class="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">\
					<input type="hidden" name="cmd" value="_donations">\
					<input type="hidden" name="business" value="xavierbelho@xavierbelho.com">\
					<input type="hidden" name="currency_code" value="EUR">\
					<input type="hidden" name="lc" value="ES">\
					<input type="hidden" name="item_name" value="Crisis What Crisis">\
					<input type="hidden" name="no_note" value="0">\
					<input type="hidden" name="bn" value="PP-DonationsBF:btn_donateCC_LG.gif:NonHostedGuest">\
					<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal. The fast and secure way to pay online.">\
					<img alt="" border="0" src="https://www.paypalobjects.com/es_ES/i/scr/pixel.gif" width="1" height="1">\
				</form>',
	},
	"gl": { 
		infoContact: '<h1>Como podes colaborar?</h1>\
			<p>O proxecto non se pode realizar sin a vosa axuda.\
			Mediante esta campa&ntilde;a espero poder cubrir costes\
			b&aacute;sicos para a realizaci&oacute;n dun proxecto destas caracter&iacute;sticas,\
			como &eacute; o combustible, o material fotogr&aacute;fico e\
			a producci&oacute;n do documental final a publicar, difundir e\
			compartir cos colaboradores.\
			</p>\
			<p>P&oacute;dese colaborar destos xeitos:</p>',
		contactList: '<ul>\
						<li>\
							<div>\
								<img src="img/icon-talk">\
								<span>Se contas a t&uacute;a historia, tes o teu recunchi&ntilde;o na web, con\
								datos de contacto (se queres) para difundir a t&uacute;a proposta\
								como “people”\
								</span>\
							</div>\
						</li>\
						<li>\
							<div>\
								<img src="img/icon-sleep">\
								<span>Se ofreces un lugar onde pasar a noite e/ou axudas coa\
								comida (ben en especie, ben con 10 euros), aparecer&aacute;s\
								nos cr&eacute;ditos como “hosts”\
								</span>\
							</div>\
						</li>\
						<li>\
							<div>\
								<img src="img/icon-fuel">\
								<span>Se ofreces combustible ou 20 euros, aparecer&aacute;s como\
								“contributors”\
								</span>\
							</div>\
						</li>\
					</ul>',
		infoPayment: '<img class="icon" src="img/icon-battery">\
			<h2>Aportando</h2>\
			<img id="supportTable" src="img/support-table-gl.png" />\
			<div>\
				<h6>Se queres participar doutro xeito no proxecto, ponte en contacto con n&oacute;s</h6>\
			</div>',
		formContact: '<h2>Contacta con n&oacute;s</h2>\
			<form name="contact" method="post">\
				<div class="formLine"><span>Nome:</span><input name="contant-name"></input></div>\
				<div class="formLine"><span>Telf:</span><input name="contant-phone"></input></div>\
				<div class="formLine"><span>Email:</span><input name="contant-email"></input></div>\
				<div class="formLine"><span>Comentario:</span><textarea name="contant-comment"></textarea></div>\
				<div class="formLine"><span>&nbsp;</span><input type="submit" value="Quero colaborar" name="contant-button"></input></div>\
			</form>',
		formDonation: '<h2>Ou fai unha donaci&oacute;n:</h2>\
			<form class="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">\
				<input type="hidden" name="cmd" value="_donations">\
				<input type="hidden" name="business" value="xavierbelho@xavierbelho.com">\
				<input type="hidden" name="currency_code" value="EUR">\
				<input type="hidden" name="lc" value="ES">\
				<input type="hidden" name="item_name" value="Crisis What Crisis">\
				<input type="hidden" name="no_note" value="0">\
				<input type="hidden" name="bn" value="PP-DonationsBF:btn_donateCC_LG.gif:NonHostedGuest">\
				<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal. A forma rápida e segura de pagar en Internet.">\
				<img alt="" border="0" src="https://www.paypalobjects.com/es_ES/i/scr/pixel.gif" width="1" height="1">\
			</form>',
	},
	"es": { 
		infoContact: '<h1>¿Cómo puedes colaborar?</h1>\
			<p>El proyecto no se puede realizar sin vuestra ayuda.\
			Mediante esta campa&ntilde;a espero poder cubrir costes\
			b&aacute;sicos para la realizaci&oacute;n de un proyecto de estas caracter&iacute;sticas,\
			como es el combustible, el material videogr&aacute;fico y\
			la producci&oacute;n del documental final a publicar, difundir y\
			compartir con los colaboradores.\
			</p>\
			<p>Se puede colaborar de estas maneras:</p>',
		contactList: '<ul>\
						<li>\
							<div>\
								<img src="img/icon-talk">\
								<span>Si cuentas tu historia, tienes tu pequeño rinc&oacute;n en la web, con\
								datos de contacto (si quieres) para difundir tu propuesta\
								como “people”\
								</span>\
							</div>\
						</li>\
						<li>\
							<div>\
								<img src="img/icon-sleep">\
								<span>Si ofreces un lugar donde pasar la noche y/o ayudas con la\
								comida (bien en especie, bien con 10 euros), aparecer&aacute;s\
								en los cr&eacute;ditos como “hosts”\
								</span>\
							</div>\
						</li>\
						<li>\
							<div>\
								<img src="img/icon-fuel">\
								<span>Si ofreces combustible o 20 euros, aparecer&aacute;s como\
								“contributors”\
								</span>\
							</div>\
						</li>\
					</ul>',
		infoPayment: '<img class="icon" src="img/icon-battery">\
				<h2>Aportando</h2>\
				<img id="supportTable" src="img/support-table-es.png" />\
				<div>\
					<h6>Si quieres participar de otra forma en el proyecto, ponte en contacto con nosotros</h6>\
				</div>',
		formContact: '<h2>Contacta con nosotros</h2>\
				<form name="contact" method="post">\
					<div class="formLine"><span>Nombre:</span><input name="contant-name"></input></div>\
					<div class="formLine"><span>Telf:</span><input name="contant-phone"></input></div>\
					<div class="formLine"><span>Email:</span><input name="contant-email"></input></div>\
					<div class="formLine"><span>Comentario:</span><textarea name="contant-comment"></textarea></div>\
					<div class="formLine"><span>&nbsp;</span><input type="submit" value="Quiero colaborar" name="contant-button"></input></div>\
				</form>',
		formDonation: '<h2>O haz una donaci&oacute;n:</h2>\
				<form class="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">\
					<input type="hidden" name="cmd" value="_donations">\
					<input type="hidden" name="business" value="xavierbelho@xavierbelho.com">\
					<input type="hidden" name="currency_code" value="EUR">\
					<input type="hidden" name="lc" value="ES">\
					<input type="hidden" name="item_name" value="Crisis What Crisis">\
					<input type="hidden" name="no_note" value="0">\
					<input type="hidden" name="bn" value="PP-DonationsBF:btn_donateCC_LG.gif:NonHostedGuest">\
					<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal. La forma rápida y segura de pagar en Internet.">\
					<img alt="" border="0" src="https://www.paypalobjects.com/es_ES/i/scr/pixel.gif" width="1" height="1">\
				</form>',
	},
};

function translate(
	to
) {
	var translation = translations[to];
	$('#idiomas a').removeClass('selected');
	$('a[name="idioma_' + to + '"]').addClass('selected');
	$('#infoContact').html(translation.infoContact);
	$('#contactList').html(translation.contactList);
	$('#infoPayment').html(translation.infoPayment);
	$('#formContact').html(translation.formContact);
	$('#formDonation').html(translation.formDonation);
}

$(function() {
	if ($("#language").val() == "en") {
		translate("en");
	} else if ($("#language").val() == "gl") {
		translate("gl");
	} else if ($("#language").val() == "es") {
		translate("es");
	} else {
		translate("en");
	}
});
