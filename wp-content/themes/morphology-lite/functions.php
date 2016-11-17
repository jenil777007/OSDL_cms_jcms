<?php
/**
 * Morphology Lite functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Morphology Lite
 */

if ( ! function_exists( 'morphology_lite_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function morphology_lite_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Morphology Lite, use a find and replace
	 * to change 'morphology-lite' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'morphology-lite', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	// Add shortcode support to the text widget.
	add_filter('widget_text', 'do_shortcode');
	
	// Indicate widget sidebars can use selective refresh in the Customizer.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Enable support for custom logo.
	add_theme_support( 'custom-logo', array(
		'height'      => 300,
		'width'       => 250,
		'flex-height' => true,
	) );
	
	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1200, 9999 ); // up to 1200 pixels wide and unlimited height
		// additional image sizes	
		if( esc_attr(get_theme_mod( 'tiled_thumbnails', 0 ) ) ) : 	
			add_image_size( 'tiled-thumbnails', 570, 570, true ); // 570 pixels wide by 570 pixels tall, crop from the center
		endif;

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'morphology-lite' ),
		'footer' => esc_html__( 'Footer Menu', 'morphology-lite' ),
		'social' => esc_html__( 'Social Menu', 'morphology-lite' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'image',
	) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', morphology_lite_fonts_url() ) );	
	
	/*
	 * Set up the WordPress core custom background feature.
	 * See https://codex.wordpress.org/Custom_Backgrounds
	 */     
    add_theme_support( 'custom-background', array( 
      'default-color'    => 'f1f1f1',
      'default-image'    => '',
    ) );
	
	
}
endif; // morphology_lite_setup
add_action( 'after_setup_theme', 'morphology_lite_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function morphology_lite_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'morphology_lite_content_width', 1024 );
}
add_action( 'after_setup_theme', 'morphology_lite_content_width', 0 );

/**
 * Register Google fonts.
 * @return string Google fonts URL for the theme.
 */

if ( ! function_exists( 'morphology_lite_fonts_url' ) ) :
function morphology_lite_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
		if( esc_attr(get_theme_mod( 'load_cyrillic_subset', 0 ) ) ) : 
			$subsets   = 'cyrillic, cyrillic-ext';
		else: 
			$subsets   = 'latin,latin-ext';
		endif;
		
	// Translators: If there are characters in your language that are not supported by Open Sans, translate this to 'off'. Do not translate into your own language. 
	if ( 'off' !== esc_html_x( 'on', 'Open Sans font: on or off', 'morphology-lite' ) ) {
		$fonts[] = 'Open Sans:300,400,600,700';
	}	

	// check to see if our body font field is empty
	if ( get_theme_mod('second_google_font') !='' ) {	
		// Translators: If there are characters in your language that are not supported by this second Google font, translate this to 'off'. Do not translate into your own language. 
		if ( 'off' !== esc_html_x( 'on', 'Your second Google font: on or off', 'morphology-lite' ) ) {
			$fonts[] = esc_attr(get_theme_mod('second_google_font'));
		}	
	}
	
	// check to see if our headings font field is empty
	if ( get_theme_mod('third_google_font') !='' ) {
		// Translators: If there are characters in your language that are not supported by this third Google font, translate this to 'off'. Do not translate into your own language. 
		if ( 'off' !== esc_html_x( 'on', 'Your third Google font: on or off', 'morphology-lite' ) ) {
			$fonts[] = esc_attr(get_theme_mod('third_google_font'));
		}	
	}
	
	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

/**
 * Enqueue scripts and styles.
 */
function morphology_lite_scripts() {
	
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'morphology-lite-fonts', morphology_lite_fonts_url(), array(), null );	
		
	// Add Font Awesome Icons. Unminified version included.
	if( esc_attr(get_theme_mod( 'load_fontawesome', 1 ) ) ) : 
		wp_enqueue_style('fontAwesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.4.0' );
	endif;
	
	// Load our responsive stylesheet based on Bootstrap.
	if( esc_attr(get_theme_mod( 'load_bootstrap', 1 ) ) ) :
		wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array( ), '4.0.0' );
	endif;
	
	// Load our primary stylesheet
	wp_enqueue_style( 'morphology-lite-style', get_stylesheet_uri() );	
	
	// Load our theme scripts
	wp_enqueue_script( 'morphology-lite-functions', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '2015', true );
	wp_enqueue_script( 'morphology-lite-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'morphology_lite_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load our sidebars.
 */
require get_template_directory() . '/inc/sidebars.php';

/**
 * Load our inline styles.
 */
require get_template_directory() . '/inc/inline-styles.php';
