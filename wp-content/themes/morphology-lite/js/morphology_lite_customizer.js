jQuery(document).ready(function() {

	/* Upsells in customizer (Documentation, Reviews and Support links */
	if( !jQuery( ".morphology-info" ).length ) {
		
		jQuery('#customize-theme-controls > ul').prepend('<li class="accordion-section morphology-info">');
	
		jQuery('.morphology-info').append('<a style="width: 80%; margin: 5px auto 5px auto; display: block; text-align: center;" href="https://www.shapedpixels.com/setup-morphology-lite/" class="button" target="_blank">{setup}</a>'.replace('{setup}', morphologyliteCustomizerObject.setup));
		
		jQuery('.morphology-info').append('<a style="width: 80%; margin: 5px auto 5px auto; display: block; text-align: center;" href="https://wordpress.org/support/view/theme-reviews/morphology-lite" class="button" target="_blank">{review}</a>'.replace('{review}', morphologyliteCustomizerObject.review));
		
		jQuery('.morphology-info').append('<a style="width: 80%; margin: 5px auto 5px auto; display: block; text-align: center;" href="https://wordpress.org/support/theme/morphology-lite" class="button" target="_blank">{support}</a>'.replace('{support}', morphologyliteCustomizerObject.support));
		
		jQuery('.morphology-info').append('<a style="width: 80%; margin: 5px auto 5px auto; display: block; text-align: center;" href="https://www.shapedpixels.com/morphology" class="button" target="_blank">{pro}</a>'.replace('{pro}',morphologyliteCustomizerObject.pro));

		jQuery('#customize-theme-controls > ul').prepend('</li>');
	}
	
});