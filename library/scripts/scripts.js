jQuery(document).ready( function($) {

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

	$('body').click(function(e) {

		var target = $(e.target);

		if ( $('body').hasClass('nav-open') ) {
			if ( (target.closest('#nav').length === 0) && (target.closest('.toggle-nav').length === 0) ) { // if clicking anywhere but nav
				closeNav();
			}
		}
	});

	/*** EQUALIZE ELEMENT HEIGHTS ***/

	equalize('body.home .articles article');


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

	function getMaxHeight(s) {

	    var maxHeight = 0;

	    // get biggest and set as tileHeight
	    $(s).each(function(){
	       if ( $(this).height() > maxHeight ) { maxHeight = $(this).height(); }
	    });

	    return maxHeight;
	}

	function equalize(s) {
	    $(s).height( getMaxHeight(s) );
	}

} );