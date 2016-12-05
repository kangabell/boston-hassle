$(document).ready( function() {

	/*** NAV ***/

	$('body').addClass('nav-closed');

	$('.toggle-nav').click( function(e) {

		// toggle nav
		if ( $('body').hasClass('nav-open') ) {
			closeNav();
		} else {
			openNav();
		}

	});

	/*** KEYBOARD SHORTCUTS ***/

	$(document).keydown(function(e) {
		if ( e.keyCode == 77 ){ // m
			openNav();
		} else if ( e.keyCode == 27 ){ // esc key
			closeNav();
		}
	});

	/*** FUNCTIONS **/

	function openNav() {
		$('body').removeClass('nav-closed').addClass('nav-open');
	}

	function closeNav() {
		$('body').removeClass('nav-open').addClass('nav-closed');
	}

} );