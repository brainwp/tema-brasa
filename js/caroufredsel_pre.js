// JavaScript Document

jQuery(function() {
    jQuery('#foo2').carouFredSel({
        prev: '#prev2',
        next: '#next2',       
		items: 1,
		circular: true,
		fx: 'fade',
		auto: {
			play: true,			
			delay: 2000,
		},
		scroll		: {
			fx: "directscroll",
			easing: "swing",
			duration: 1200,
		}
    });
});
