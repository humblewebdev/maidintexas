/* CUSTOM FUNCTIONS */

jQuery(document).ready(function(){

	// Create the responsive navigation
	jQuery('.main-navigation').clone().removeClass('main-navigation').appendTo('.responsive-navigation');
	
	// Create the responsive top navigation
	jQuery('#top-nav ul:first-child').clone().appendTo('.responsive-top-navigation');

	// Toggle the responsive top navigation
	jQuery('#responsive-top-nav-button').click(function(event){
		event.preventDefault();
		jQuery('.responsive-top-navigation').slideToggle();
	});

	// Toggle the responsive navigation
	jQuery('.responsive-navigation-button').click(function(event){
		event.preventDefault();
		jQuery('.responsive-navigation').slideToggle();
	});
	
});