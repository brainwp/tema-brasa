jQuery(function() {
// OPACITY OF BUTTON SET TO 0%
jQuery(".roll").css("opacity","0");
 
// ON MOUSE OVER
jQuery(".roll").hover(function () {
 
// SET OPACITY TO 50%
jQuery(this).stop().animate({
opacity: .5
}, "slow");
},
 
// ON MOUSE OUT
function () {
 
// SET OPACITY BACK TO 0%
jQuery(this).stop().animate({
opacity: 0
}, "slow");
});
});
jQuery(function($){	
	$(document).ready(function(){
		if($('body').hasClass('is-mobile') == false){
			$('.tel-href').on('click',function(e){
				e.preventDefault();
				if($(this).attr('data-open') == false || $(this).attr('data-open') == null){
					$(this).children('.tel-toggle').fadeIn('slow');
					$(this).parent('.profile-footer').addClass('hide-all');
					$(this).attr('data-open','true');
				}
				else{
					$(this).children('.tel-toggle').fadeOut('slow');
					$(this).parent('.profile-footer').removeClass('hide-all');
					$(this).removeAttr('data-open');
				}
				return false;
			});
		}
	});
});	