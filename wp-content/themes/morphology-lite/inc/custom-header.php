<?php
/**
 * Sample implementation of the Custom Header feature.
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php if ( get_header_image() ) : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
	</a>
	<?php endif; // End header image check. ?>
 *
 * @link http://codex.wordpress.org/Custom_Headers
 *
 * @package Morphology Lite
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses morphology_lite_header_style()
 * @uses morphology_lite_admin_header_style()
 * @uses morphology_lite_admin_header_image()
 */
function morphology_lite_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'morphology_lite_custom_header_args', array(
		'width'         => 300,
		'flex-width'    => true,
		'height'        => 1500,
		'flex-height'    => true,
		'uploads'       => true,
		'header-text'  	=> false
	) ) );
}
add_action( 'after_setup_theme', 'morphology_lite_custom_header_setup' );