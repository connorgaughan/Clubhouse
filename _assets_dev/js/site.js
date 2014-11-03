jQuery(document).ready(function($) {
	jQuery('.icon-menu').on('click', function(){
		jQuery('.main-menu').fadeIn('slow');
		jQuery('.main-menu').on('click', function(){
			jQuery('.main-menu').fadeOut('slow');
		});
	});
	jQuery('.more-comments').on('click', function(){
		$('html, body').animate({
	        scrollTop: $('#disqus_thread').offset('75').top
	    }, 1000);
	});
	jQuery('.flexslider').flexslider({
		animation: "fade",
		slideshow: true,
		slideshowSpeed: 7000,		
		animationSpeed: 600,
		initDelay: 0,
		randomize: false,
		pauseOnHover: false,
		touch: true,
		controlNav: true,
		directionNav: false,
		keyboard: true,
	});
	jQuery('.more').on('click', function(e){
		e.preventDefault();
		jQuery('.full-disclosure').slideToggle('slow');
		$('html, body').animate({
	        scrollTop: $('.full-disclosure').offset().top
	    }, 1000);
	});
	jQuery('.lead').addClass('js');
});

jQuery(document).keyup(function(e){
	if ( jQuery('.main-menu').is(':visible') && e.keyCode == 27 ){
		jQuery('.main-menu').fadeOut('slow');
	}
});