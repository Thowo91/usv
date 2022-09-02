jQuery(document).ready(function($) {
	$('.menu_button').click(function(e){
		e.preventDefault();
		$('#menu-main-menu').toggleClass('expanded');
	});
});
