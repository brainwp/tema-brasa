jQuery(document).ready(function($) {
	$(function() {
		$('.open-popup-link').magnificPopup({
			type:'inline',
			midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
		});
	});
	
   	$('.open-popup-link').trigger('click');
});
