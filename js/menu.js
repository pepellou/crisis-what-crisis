if (window.$) {
	$(function() {
		$('a[name="what"]').hover(
			function() { 
				$('.line').css({'display':'none'}); 
				$('.box').css({'display':'none'}); 
				$('.what').css({'display':'block'}); 
			}
		);
		$('a[name="why"]').hover(
			function() { 
				$('.line').css({'display':'none'}); 
				$('.box').css({'display':'none'}); 
				$('.why').css({'display':'block'}); 
			}
		);
		$('a[name="who"]').hover(
			function() { 
				$('.line').css({'display':'none'}); 
				$('.box').css({'display':'none'}); 
				$('.who').css({'display':'block'}); 
			}
		);
		$('a[name="where"]').hover(
			function() { 
				$('.line').css({'display':'none'}); 
				$('.box').css({'display':'none'}); 
				$('.where').css({'display':'block'}); 
			}
		);
		$('a[name="how"]').hover(
			function() { 
				$('.line').css({'display':'none'}); 
				$('.box').css({'display':'none'}); 
				$('.how').css({'display':'block'}); 
			}
		);
	});
}
