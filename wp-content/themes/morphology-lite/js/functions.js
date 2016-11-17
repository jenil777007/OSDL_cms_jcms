/**
 * Various functions for this theme
*/	


(function($) {

   'use strict';	
 
   		var nav = $( '#site-navigation' ), button, menu;
		if ( ! nav ) {
			return;
		}

		button = nav.find( '.menu-toggle' );
		if ( ! button ) {
			return;
		}

		// Hide button if menu is missing or empty.
		menu = nav.find( '.nav-menu' );
		if ( ! menu || ! menu.children().length ) {
			button.hide();
			return;
		}

		$( '.menu-toggle' ).on( 'click.morphology', function() {
			nav.toggleClass( 'toggled-on' );
		} );
				

		
})(jQuery);





// Lets add some classes to theme elements
jQuery(document).ready(function($){
  $('article').addClass('clearfix');
});