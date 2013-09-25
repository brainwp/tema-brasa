/*

* Mobile Navigation for twentyeleven created by Jesse Hallett http://bowesales.com
* With Special Thanks to these two lads:

* Chris Coyier's Mobile Navigation Technique
* http://css-tricks.com/convert-menu-to-dropdown/
* Article Date: 05/15/2011

* Demo Taken from Ian Yates' tutorial on Tuts+
* http://webdesign.tutsplus.com/tutorials/complete-websites/building-a-responsive-layout-with-skeleton-navigation/
* Article Date: 03/19/2012
*/

/* Mobile Navigation
================================================== */
jQuery(function($){	
$(document).ready(function() {
	
	//build dropdown
	$("<select />").appendTo("nav .menu");
	
	// Create default option
	$("<option />", {
	   "selected": "selected",
	   "value"   : "",
	   "text"    : "Menu" //Change default text
	}).appendTo("nav select");	
	
	// Populate dropdowns with dash for child pages
	$("nav .menu a").each(function() {
	 	var el = $(this);
		var padding = "";
   for (var i = 0; i < el.parentsUntil('div > ul').length - 1; i++)
       padding += "&ndash;";
	 	$("<option />", {
	     	"value"   : el.attr("href"),
	    	"html"    : padding + el.text(),
	 	}).appendTo("nav select");
	});
	
	//make responsive dropdown menu actually work			
  	$("nav select").change(function() {
    	window.location = $(this).find("option:selected").val();
  	});

});	
});