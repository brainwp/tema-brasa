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
