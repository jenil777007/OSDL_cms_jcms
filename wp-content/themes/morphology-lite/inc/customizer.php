<?php
/**
 * Morphology Lite Theme Customizer.
 *
 * @package Morphology Lite
 */

 
function morphology_lite_customizer_registers() {
	
	wp_enqueue_script( 'morphology_lite_customizer_script', get_template_directory_uri() . '/js/morphology_lite_customizer.js', array("jquery"), '1.0', true  );
	wp_localize_script( 'morphology_lite_customizer_script', 'morphologyliteCustomizerObject', array(
		'setup' => __( 'Setup Tutorials', 'morphology-lite' ),
		'support' => __( 'Theme Support', 'morphology-lite' ),
		'review' => __( 'Please Rate Morphology Lite', 'morphology-lite' ),		
		'pro' => __( 'Get the Pro Version', 'morphology-lite' ),
	) );
}
add_action( 'customize_controls_enqueue_scripts', 'morphology_lite_customizer_registers' );

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function morphology_lite_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_section( 'background_image' )->title = esc_html__( 'Page Background Image', 'morphology-lite' );
  	$wp_customize->get_control( 'background_color' )->label = esc_html__( 'Page Background Colour without Background Image)', 'morphology-lite' );
	
	// lets remove the default background color setting to move it in the Background Image section
	$wp_customize->remove_control('background_color');		
	
// Begin theme options

	// Setting group to show the site title  
  	$wp_customize->add_setting( 'show_site_title',  array(
		'default' => 1,
		'sanitize_callback' => 'morphology_lite_sanitize_checkbox'
   	 ) );  
 	 $wp_customize->add_control( 'show_site_title', array(
		'type'     => 'checkbox',
		'priority' => 1,
		'label'    => esc_html__( 'Show Site Title', 'morphology-lite' ),
		'section'  => 'title_tagline',
 	 ) );

	// Setting group to show the tagline  
	 $wp_customize->add_setting( 'show_tagline', array(
		'default' => 1,
		'sanitize_callback' => 'morphology_lite_sanitize_checkbox'
	  ) );  
	$wp_customize->add_control( 'show_tagline', array(
		'type'     => 'checkbox',
		'priority' => 2,
		'label'    => esc_html__( 'Show Tagline', 'morphology-lite' ),
		'section'  => 'title_tagline',
	) );
	 

	
	
/*
 * Create a new customizer section
 * Name: Site Options
 */    
	$wp_customize->add_section( 'site_options', array(
		'title' => esc_html__( 'Site Options', 'morphology-lite' ),
		'priority'       => 30,
	) ); 	
	
	// Setting group to enable bootstrap
	$wp_customize->add_setting( 'load_bootstrap',	array(
		'default' => 1,
		'sanitize_callback' => 'morphology_lite_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'load_bootstrap', array(
		'type'     => 'checkbox',
		'priority' => 2,
		'label'    => esc_html__( 'Load Bootstrap CSS', 'morphology-lite' ),
		'description' => esc_html__( 'Load the Bootstrap grid layout and some limited CSS elements if nothing else is loading it for you.', 'morphology-lite' ),
		'section'  => 'site_options',
	) );
	// Setting group to enable font awesome 
	$wp_customize->add_setting( 'load_fontawesome',	array(
		'default' => 1,
		'sanitize_callback' => 'morphology_lite_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'load_fontawesome', array(
		'type'     => 'checkbox',
		'priority' => 3,
		'label'    => esc_html__( 'Load Font Awesome', 'morphology-lite' ),
		'description' => esc_html__( 'Load Font Awesome if not you are not using a plugin for it.', 'morphology-lite' ),
		'section'  => 'site_options',
	) );	
	
	 // Show the side column social menu
	  $wp_customize->add_setting( 'show_columnfooter',  array(
		  'default' => 1,
		  'sanitize_callback' => 'morphology_lite_sanitize_checkbox',
		) );  
	  $wp_customize->add_control( 'show_columnfooter', array(
		'type'     => 'checkbox',
		'priority' => 5,
		'label'    => esc_html__( 'Show Side Column Footer', 'morphology-lite' ),
		'description' => esc_html__( 'Show the side column footer social and copyright information.', 'morphology-lite' ),
		'section'  => 'site_options',
	  ) );
	  
	 // Setting group to show the edit links 
	  $wp_customize->add_setting( 'show_edit',  array(
		  'default' => 0,
		  'sanitize_callback' => 'morphology_lite_sanitize_checkbox',
		) );  
	  $wp_customize->add_control( 'show_edit', array(
		'type'     => 'checkbox',
		'priority' => 6,
		'label'    => esc_html__( 'Show Edit Link', 'morphology-lite' ),
		'description' => esc_html__( 'Show the Edit Link on posts and pages.', 'morphology-lite' ),
		'section'  => 'site_options',
	  ) );	
  
 	 // Setting group to show the edit links 
	  $wp_customize->add_setting( 'tiled_thumbnails',  array(
		  'default' => 0,
		  'sanitize_callback' => 'morphology_lite_sanitize_checkbox',
		) );  
	  $wp_customize->add_control( 'tiled_thumbnails', array(
		'type'     => 'checkbox',
		'priority' => 7,
		'label'    => esc_html__( 'Create Image Post Tiled Thumbnails', 'morphology-lite' ),
		'description' => esc_html__( 'If you use the Image Post format and want a titled layout with consistent featured image sizes of 570 x 570 for post summaries.', 'morphology-lite' ),
		'section'  => 'site_options',
	  ) );	 
  
	// Setting group for a Copyright
	$wp_customize->add_setting( 'copyright', array(
		'default'        => esc_html__( 'Your Name', 'morphology-lite' ),
		'sanitize_callback' => 'morphology_lite_sanitize_text',
	) );
	$wp_customize->add_control( 'copyright', array(
		'settings' => 'copyright',
		'label'    => esc_html__( 'Your Copyright Name', 'morphology-lite' ),
		'section'  => 'site_options',		
		'type'     => 'text',
		'priority' => 20,
	) );  
  
/*
 * Create a new customizer section
 * Name: Blog Options
 */    
	$wp_customize->add_section( 'blog_options', array(
		'title' => esc_html__( 'Blog Options', 'morphology-lite' ),
		'priority'       => 35,
	) ); 
	
	// Setting group for blog layout  
	$wp_customize->add_setting( 'blog_style', array(
		'default' => 'blogstyle2',
		'sanitize_callback' => 'morphology_lite_sanitize_blogstyle',
	) );  
	$wp_customize->add_control( 'blog_style', array(
		  'type' => 'radio',
		  'label' => esc_html__( 'Blog Style', 'morphology-lite' ),
		  'section' => 'blog_options',
		  'priority' => 1,
		  'choices' => array(	
				'blogstyle1' => esc_html__( 'Top Featured Image', 'morphology-lite' ),	 
				'blogstyle2' => esc_html__( 'Top Featured Image with Summary Left Aligned', 'morphology-lite' ), 
				'blogstyle3' => esc_html__( 'Top Featured Image &amp; Summary Centered', 'morphology-lite' ),
				'blogstyle4' => esc_html__( 'Top Featured Image with Right Sidebar', 'morphology-lite' ),
		) ) );		

	// Setting group for single layout  
	$wp_customize->add_setting( 'single_style', array(
		'default' => 'singlestyle1',
		'sanitize_callback' => 'morphology_lite_sanitize_singlestyle',
	) );  
	$wp_customize->add_control( 'single_style', array(
		  'type' => 'radio',
		  'label' => esc_html__( 'Single Post Style', 'morphology-lite' ),
		  'section' => 'blog_options',
		  'priority' => 2,
		  'choices' => array(	
				'singlestyle1' => esc_html__( 'Right Sidebar Column', 'morphology-lite' ),	
				'singlestyle2' => esc_html__( 'Right Sidebar Column - Fluid Width', 'morphology-lite' ),
				'singlestyle3' => esc_html__( 'Full Width', 'morphology-lite' ),
		) ) );	
			
		
		
// Setting group for post count
$wp_customize->add_setting( 'post_count', array(
	'default'        => '12',
	'sanitize_callback' => 'morphology_lite_sanitize_integer',
) );
$wp_customize->add_control( 'post_count', array(
	'settings' => 'post_count',
	'label'    => esc_html__( 'Image Post Template Count', 'morphology-lite' ),
	'section'  => 'blog_options',
	'type'     => 'text',
	'priority'   => 4,
) );



// Setting for content or excerpt
	$wp_customize->add_setting( 'excerpt_content', array(
		'default' => 'content',
		'sanitize_callback' => 'morphology_lite_sanitize_excerpt',
	) );
// Control for Content or excerpt
	$wp_customize->add_control( 'excerpt_content', array(
    'label'   => esc_html__( 'Content or Excerpt', 'morphology-lite' ),
    'section' => 'blog_options',
	'priority'       => 5,
    'type'    => 'radio',
        'choices' => array(
            'content' => esc_html__( 'Content', 'morphology-lite' ),
            'excerpt' => esc_html__( 'Excerpt', 'morphology-lite' ),	
        ),
	
    ));

// Setting group for a excerpt
	$wp_customize->add_setting( 'excerpt_limit', array(
		'default'        => '50',
		'sanitize_callback' => 'morphology_lite_sanitize_integer',
	) );
	$wp_customize->add_control( 'excerpt_limit', array(
		'settings' => 'excerpt_limit',
		'label'    => esc_html__( 'Excerpt Length', 'morphology-lite' ),
		'section'  => 'blog_options',
		'type'     => 'text',
		'priority'   => 6,
	) );

	 // Show the post format label 
	  $wp_customize->add_setting( 'show_post_format',  array(
		  'default' => 1,
		  'sanitize_callback' => 'morphology_lite_sanitize_checkbox',
		) );  
	  $wp_customize->add_control( 'show_post_format', array(
		'type'     => 'checkbox',
		'priority' => 10,
		'label'    => esc_html__( 'Show Post Format Label', 'morphology-lite' ),
		'description' => esc_html__( 'Show the post format label in the meta info like the date, author, etc.', 'morphology-lite' ),
		'section'  => 'blog_options',
	  ) );
	  
	 // Show the post summary meta info 
	  $wp_customize->add_setting( 'show_summary_meta',  array(
		  'default' => 1,
		  'sanitize_callback' => 'morphology_lite_sanitize_checkbox',
		) );  
	  $wp_customize->add_control( 'show_summary_meta', array(
		'type'     => 'checkbox',
		'priority' => 11,
		'label'    => esc_html__( 'Show Summary Meta Info', 'morphology-lite' ),
		'description' => esc_html__( 'Show the post summary meta info like the date, author, etc.', 'morphology-lite' ),
		'section'  => 'blog_options',
	  ) );	

	 // Show the full post meta info 
	  $wp_customize->add_setting( 'show_single_meta_info',  array(
		  'default' => 1,
		  'sanitize_callback' => 'morphology_lite_sanitize_checkbox',
		) );  
	  $wp_customize->add_control( 'show_single_meta_info', array(
		'type'     => 'checkbox',
		'priority' => 11,
		'label'    => esc_html__( 'Show Full Post Meta Info', 'morphology-lite' ),
		'description' => esc_html__( 'Show the full post meta info like the date, author, etc.', 'morphology-lite' ),
		'section'  => 'blog_options',
	  ) );	

	  // Show single featured image
	  $wp_customize->add_setting( 'show_single_thumbnail',  array(
		  'default' => 1,
		  'sanitize_callback' => 'morphology_lite_sanitize_checkbox',
		) );  
	  $wp_customize->add_control( 'show_single_thumbnail', array(
		'type'     => 'checkbox',
		'priority' => 11,
		'label'    => esc_html__( 'Show Featured Image on Full Post', 'morphology-lite' ),
		'description' => esc_html__( 'Show the featured image on the full post view.', 'morphology-lite' ),
		'section'  => 'blog_options',
	  ) );	
	  
	 // Show the post date 
	  $wp_customize->add_setting( 'show_postdate',  array(
		  'default' => 1,
		  'sanitize_callback' => 'morphology_lite_sanitize_checkbox',
		) );  
	  $wp_customize->add_control( 'show_postdate', array(
		'type'     => 'checkbox',
		'priority' => 12,
		'label'    => esc_html__( 'Show Post Date', 'morphology-lite' ),
		'description' => esc_html__( 'Show the post date on all blog articles.', 'morphology-lite' ),
		'section'  => 'blog_options',
	  ) );
	  
	 // Show the post author 
	  $wp_customize->add_setting( 'show_postauthor',  array(
		  'default' => 1,
		  'sanitize_callback' => 'morphology_lite_sanitize_checkbox',
		) );  
	  $wp_customize->add_control( 'show_postauthor', array(
		'type'     => 'checkbox',
		'priority' => 14,
		'label'    => esc_html__( 'Show Post Author', 'morphology-lite' ),
		'description' => esc_html__( 'Show the post author on all blog articles.', 'morphology-lite' ),
		'section'  => 'blog_options',
	  ) );

	 // Show the post comments count on the summary 
	  $wp_customize->add_setting( 'show_commentslink',  array(
		  'default' => 1,
		  'sanitize_callback' => 'morphology_lite_sanitize_checkbox',
		) );  
	  $wp_customize->add_control( 'show_commentslink', array(
		'type'     => 'checkbox',
		'priority' => 15,
		'label'    => esc_html__( 'Show Comments Link', 'morphology-lite' ),
		'description' => esc_html__( 'Show the comments link on the post summaries.', 'morphology-lite' ),
		'section'  => 'blog_options',
	  ) );

	 // Show the single categories list
	  $wp_customize->add_setting( 'show_categories',  array(
		  'default' => 1,
		  'sanitize_callback' => 'morphology_lite_sanitize_checkbox',
		) );  
	  $wp_customize->add_control( 'show_categories', array(
		'type'     => 'checkbox',
		'priority' => 16,
		'label'    => esc_html__( 'Show Categories', 'morphology-lite' ),
		'description' => esc_html__( 'Show the categories list on the full post view.', 'morphology-lite' ),
		'section'  => 'blog_options',
	  ) );

	 // Show the single tags list
	  $wp_customize->add_setting( 'show_tags',  array(
		  'default' => 1,
		  'sanitize_callback' => 'morphology_lite_sanitize_checkbox',
		) );  
	  $wp_customize->add_control( 'show_tags', array(
		'type'     => 'checkbox',
		'priority' => 17,
		'label'    => esc_html__( 'Show Tags', 'morphology-lite' ),
		'description' => esc_html__( 'Show the tags list on the full post view.', 'morphology-lite' ),
		'section'  => 'blog_options',
	  ) );

	  // Show the single post nav
	  $wp_customize->add_setting( 'show_postnav',  array(
		  'default' => 1,
		  'sanitize_callback' => 'morphology_lite_sanitize_checkbox',
		) );  
	  $wp_customize->add_control( 'show_postnav', array(
		'type'     => 'checkbox',
		'priority' => 18,
		'label'    => esc_html__( 'Show Post Navigation', 'morphology-lite' ),
		'description' => esc_html__( 'Show the next previous navigation on the full post view.', 'morphology-lite' ),
		'section'  => 'blog_options',
	  ) );
	  
	 // Show the single author bio
	  $wp_customize->add_setting( 'show_authorbio',  array(
		  'default' => 1,
		  'sanitize_callback' => 'morphology_lite_sanitize_checkbox',
		) );  
	  $wp_customize->add_control( 'show_authorbio', array(
		'type'     => 'checkbox',
		'priority' => 19,
		'label'    => esc_html__( 'Show Author Bio', 'morphology-lite' ),
		'description' => esc_html__( 'Show the author bio information at the bottom of the full post view.', 'morphology-lite' ),
		'section'  => 'blog_options',
	  ) );

	 // Show the single post nav
	  $wp_customize->add_setting( 'show_blognav',  array(
		  'default' => 1,
		  'sanitize_callback' => 'morphology_lite_sanitize_checkbox',
		) );  
	  $wp_customize->add_control( 'show_blognav', array(
		'type'     => 'checkbox',
		'priority' => 20,
		'label'    => esc_html__( 'Show Blog Navigation', 'morphology-lite' ),
		'description' => esc_html__( 'Show the blog home page navigation to see older or newer posts.', 'morphology-lite' ),
		'section'  => 'blog_options',
	  ) );

	  // Show archive title
	  $wp_customize->add_setting( 'show_archive_title',  array(
		  'default' => 1,
		  'sanitize_callback' => 'morphology_lite_sanitize_checkbox',
		) );  
	  $wp_customize->add_control( 'show_archive_title', array(
		'type'     => 'checkbox',
		'priority' => 21,
		'label'    => esc_html__( 'Show Archive Title', 'morphology-lite' ),
		'description' => esc_html__( 'Show the archive page title for categories, tags, etc.', 'morphology-lite' ),
		'section'  => 'blog_options',
	  ) );

	  // Show category description
	  $wp_customize->add_setting( 'show_category_desc',  array(
		  'default' => 1,
		  'sanitize_callback' => 'morphology_lite_sanitize_checkbox',
		) );  
	  $wp_customize->add_control( 'show_category_desc', array(
		'type'     => 'checkbox',
		'priority' => 22,
		'label'    => esc_html__( 'Show Category Description', 'morphology-lite' ),
		'description' => esc_html__( 'Show the blog category page description.', 'morphology-lite' ),
		'section'  => 'blog_options',
	  ) );	  

	  // Show archive header group
	  $wp_customize->add_setting( 'show_archive_header',  array(
		  'default' => 0,
		  'sanitize_callback' => 'morphology_lite_sanitize_checkbox',
		) );  
	  $wp_customize->add_control( 'show_archive_header', array(
		'type'     => 'checkbox',
		'priority' => 23,
		'label'    => esc_html__( 'Show Archive Header', 'morphology-lite' ),
		'description' => esc_html__( 'Show the archive header group which includes title and category description.', 'morphology-lite' ),
		'section'  => 'blog_options',
	  ) );	
	  
	  
/*
 * Lets add to the Colour section
 */ 

// left column background
 	$wp_customize->add_setting( 'column_bg', array(
		'default'        => '#fff',
		'sanitize_callback' => 'morphology_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'column_bg', array(
		'label'   => esc_html__( 'Side Column Background', 'morphology-lite' ),
		'section' => 'colors',
		'settings'   => 'column_bg',
		'priority' => 1,			
	) ) );
	
// left column top background
 	$wp_customize->add_setting( 'column_top_bg', array(
		'default'        => '',
		'sanitize_callback' => 'morphology_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'column_top_bg', array(
		'label'   => esc_html__( 'Side Column Top Background', 'morphology-lite' ),
		'section' => 'colors',
		'settings'   => 'column_top_bg',
		'priority' => 2,			
	) ) );	
	
// left column site title
 	$wp_customize->add_setting( 'site_title_colour', array(
		'default'        => '#000',
		'sanitize_callback' => 'morphology_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'site_title_colour', array(
		'label'   => esc_html__( 'Site Title Colour', 'morphology-lite' ),
		'section' => 'colors',
		'settings'   => 'site_title_colour',
		'priority' => 3,			
	) ) );

// left column site title
 	$wp_customize->add_setting( 'site_desc_colour', array(
		'default'        => '#797d82',
		'sanitize_callback' => 'morphology_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'site_desc_colour', array(
		'label'   => esc_html__( 'Site Description Colour', 'morphology-lite' ),
		'section' => 'colors',
		'settings'   => 'site_desc_colour',
		'priority' => 4,			
	) ) );	
	  
// left column site info
 	$wp_customize->add_setting( 'column_site_info', array(
		'default'        => '#333',
		'sanitize_callback' => 'morphology_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'column_site_info', array(
		'label'   => esc_html__( 'Column Footer Site Info Colour', 'morphology-lite' ),
		'section' => 'colors',
		'settings'   => 'column_site_info',
		'priority' => 5,			
	) ) );		  

// social icon background
 	$wp_customize->add_setting( 'column_social_icon_bg', array(
		'default'        => '#beb27a',
		'sanitize_callback' => 'morphology_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'column_social_icon_bg', array(
		'label'   => esc_html__( 'Column Social Icon Background', 'morphology-lite' ),
		'section' => 'colors',
		'settings'   => 'column_social_icon_bg',
		'priority' => 6,			
	) ) );		

// social icon background
 	$wp_customize->add_setting( 'column_social_icon', array(
		'default'        => '#fff',
		'sanitize_callback' => 'morphology_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'column_social_icon', array(
		'label'   => esc_html__( 'Column Social Icon', 'morphology-lite' ),
		'section' => 'colors',
		'settings'   => 'column_social_icon',
		'priority' => 7,			
	) ) );	

// social icon hover background
 	$wp_customize->add_setting( 'column_social_icon_hbg', array(
		'default'        => '#626466',
		'sanitize_callback' => 'morphology_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'column_social_icon_hbg', array(
		'label'   => esc_html__( 'Column Social Icon Background on Hover', 'morphology-lite' ),
		'section' => 'colors',
		'settings'   => 'column_social_icon_hbg',
		'priority' => 8,			
	) ) );

// social icon background
 	$wp_customize->add_setting( 'column_social_hicon', array(
		'default'        => '#fff',
		'sanitize_callback' => 'morphology_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'column_social_hicon', array(
		'label'   => esc_html__( 'Column Social Icon on Hover', 'morphology-lite' ),
		'section' => 'colors',
		'settings'   => 'column_social_hicon',
		'priority' => 9,			
	) ) );	





// content area social icon background
 	$wp_customize->add_setting( 'content_social_icon_bg', array(
		'default'        => '#beb27a',
		'sanitize_callback' => 'morphology_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'content_social_icon_bg', array(
		'label'   => esc_html__( 'Content Area Social Icon Background', 'morphology-lite' ),
		'section' => 'colors',
		'settings'   => 'content_social_icon_bg',
		'priority' => 10,			
	) ) );

// content area social icon background
 	$wp_customize->add_setting( 'content_social_icon', array(
		'default'        => '#fff',
		'sanitize_callback' => 'morphology_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'content_social_icon', array(
		'label'   => esc_html__( 'Content Area Social Icon', 'morphology-lite' ),
		'section' => 'colors',
		'settings'   => 'content_social_icon',
		'priority' => 11,			
	) ) );	

// content area social icon hover background
 	$wp_customize->add_setting( 'content_social_icon_hbg', array(
		'default'        => '#626466',
		'sanitize_callback' => 'morphology_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'content_social_icon_hbg', array(
		'label'   => esc_html__( 'Content Area Social Icon Background on Hover', 'morphology-lite' ),
		'section' => 'colors',
		'settings'   => 'content_social_icon_hbg',
		'priority' => 12,			
	) ) );

// content area social icon background
 	$wp_customize->add_setting( 'content_social_hicon', array(
		'default'        => '#fff',
		'sanitize_callback' => 'morphology_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'content_social_hicon', array(
		'label'   => esc_html__( 'Content Social Icon on Hover', 'morphology-lite' ),
		'section' => 'colors',
		'settings'   => 'content_social_hicon',
		'priority' => 13,			
	) ) );	

// body background
 	$wp_customize->add_setting( 'body_bg', array(
		'default'        => '#f1f1f1',
		'sanitize_callback' => 'morphology_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'body_bg', array(
		'label'   => esc_html__( 'Page Background Colour', 'morphology-lite' ),
		'section' => 'colors',
		'settings'   => 'body_bg',
		'priority' => 14,			
	) ) );

// content background
 	$wp_customize->add_setting( 'content_bg', array(
		'default'        => '#fff',
		'sanitize_callback' => 'morphology_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'content_bg', array(
		'label'   => esc_html__( 'Content Background Colour', 'morphology-lite' ),
		'section' => 'colors',
		'settings'   => 'content_bg',
		'priority' => 15,			
	) ) );

// content text colour
 	$wp_customize->add_setting( 'body_text', array(
		'default'        => '#333',
		'sanitize_callback' => 'morphology_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'body_text', array(
		'label'   => esc_html__( 'Body Text Colour', 'morphology-lite' ),
		'section' => 'colors',
		'settings'   => 'body_text',
		'priority' => 16,			
	) ) );

// headings colour
 	$wp_customize->add_setting( 'content_headings', array(
		'default'        => '#333',
		'sanitize_callback' => 'morphology_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'content_headings', array(
		'label'   => esc_html__( 'Content Headings Colour', 'morphology-lite' ),
		'section' => 'colors',
		'settings'   => 'content_headings',
		'priority' => 17,			
	) ) );
	
// blog post heading colour
 	$wp_customize->add_setting( 'blog_post_heading', array(
		'default'        => '#333',
		'sanitize_callback' => 'morphology_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blog_post_heading', array(
		'label'   => esc_html__( 'Blog Post Heading Colour', 'morphology-lite' ),
		'section' => 'colors',
		'settings'   => 'blog_post_heading',
		'priority' => 18,			
	) ) );	

// footer background colour
 	$wp_customize->add_setting( 'footer_bg', array(
		'default'        => '#191a1c',
		'sanitize_callback' => 'morphology_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_bg', array(
		'label'   => esc_html__( 'Footer Background Colour', 'morphology-lite' ),
		'section' => 'colors',
		'settings'   => 'footer_bg',
		'priority' => 19,			
	) ) );
	
// footer heading colour
 	$wp_customize->add_setting( 'footer_text', array(
		'default'        => '#c2c2c2',
		'sanitize_callback' => 'morphology_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_text', array(
		'label'   => esc_html__( 'Footer Text Colour', 'morphology-lite' ),
		'section' => 'colors',
		'settings'   => 'footer_text',
		'priority' => 19,			
	) ) );

// footer links colour
 	$wp_customize->add_setting( 'footer_links', array(
		'default'        => '#beb27a',
		'sanitize_callback' => 'morphology_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_links', array(
		'label'   => esc_html__( 'Footer Link Colour', 'morphology-lite' ),
		'section' => 'colors',
		'settings'   => 'footer_links',
		'priority' => 19,			
	) ) );
	
	
// content link colour
 	$wp_customize->add_setting( 'content_link_colour', array(
		'default'        => '#b8a138',
		'sanitize_callback' => 'morphology_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'content_link_colour', array(
		'label'   => esc_html__( 'Content Area Links', 'morphology-lite' ),
		'section' => 'colors',
		'settings'   => 'content_link_colour',
		'priority' => 20,			
	) ) );
	
// content link hover colour
 	$wp_customize->add_setting( 'content_link_hcolour', array(
		'default'        => ' #333',
		'sanitize_callback' => 'morphology_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'content_link_hcolour', array(
		'label'   => esc_html__( 'Content Area Links on Hover', 'morphology-lite' ),
		'section' => 'colors',
		'settings'   => 'content_link_hcolour',
		'priority' => 21,			
	) ) );	

// content widget list border colour
 	$wp_customize->add_setting( 'content_list_border', array(
		'default'        => '#e6e6e6',
		'sanitize_callback' => 'morphology_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'content_list_border', array(
		'label'   => esc_html__( 'Content Widget List Border Colour', 'morphology-lite' ),
		'section' => 'colors',
		'settings'   => 'content_list_border',
		'priority' => 22,			
	) ) );	
	
// bottom headings colour
 	$wp_customize->add_setting( 'bottom_headings', array(
		'default'        => '#fff',
		'sanitize_callback' => 'morphology_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bottom_headings', array(
		'label'   => esc_html__( 'Bottom Sidebar Heading Colour', 'morphology-lite' ),
		'section' => 'colors',
		'settings'   => 'bottom_headings',
		'priority' => 23,			
	) ) );	
// bottom sidebar text and link colour
 	$wp_customize->add_setting( 'bottom_text_colour', array(
		'default'        => '#ccc',
		'sanitize_callback' => 'morphology_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bottom_text_colour', array(
		'label'   => esc_html__( 'Bottom Sidebar Text and Links', 'morphology-lite' ),
		'section' => 'colors',
		'settings'   => 'bottom_text_colour',
		'priority' => 24,			
	) ) );	
	
// bottom sidebar link hover colour
 	$wp_customize->add_setting( 'bottom_link_hcolour', array(
		'default'        => '#cec499',
		'sanitize_callback' => 'morphology_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bottom_link_hcolour', array(
		'label'   => esc_html__( 'Bottom Sidebar Link Colour on Hover', 'morphology-lite' ),
		'section' => 'colors',
		'settings'   => 'bottom_link_hcolour',
		'priority' => 25,			
	) ) );		
	
// bottom sidebar list border colour
 	$wp_customize->add_setting( 'bottom_list_border', array(
		'default'        => '#444',
		'sanitize_callback' => 'morphology_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bottom_list_border', array(
		'label'   => esc_html__( 'Bottom Sidebar List Border Colour', 'morphology-lite' ),
		'section' => 'colors',
		'settings'   => 'bottom_list_border',
		'priority' => 26,			
	) ) );		
	
// blog post meta info colour
 	$wp_customize->add_setting( 'post_meta_colour', array(
		'default'        => '#919191',
		'sanitize_callback' => 'morphology_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'post_meta_colour', array(
		'label'   => esc_html__( 'Blog Post Meta Info Colour', 'morphology-lite' ),
		'section' => 'colors',
		'settings'   => 'post_meta_colour',
		'priority' => 27,			
	) ) );	
	
// read more button
 	$wp_customize->add_setting( 'readmore_icon_bg', array(
		'default'        => '#fff',
		'sanitize_callback' => 'morphology_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'readmore_icon_bg', array(
		'label'   => esc_html__( 'Read More Icon Button Background', 'morphology-lite' ),
		'section' => 'colors',
		'settings'   => 'readmore_icon_bg',
		'priority' => 28,			
	) ) );	

// read more button border
 	$wp_customize->add_setting( 'readmore_border', array(
		'default'        => '#cbcbcb',
		'sanitize_callback' => 'morphology_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'readmore_border', array(
		'label'   => esc_html__( 'Read More Icon Border', 'morphology-lite' ),
		'section' => 'colors',
		'settings'   => 'readmore_border',
		'priority' => 29,			
	) ) );

// read more button icon
 	$wp_customize->add_setting( 'readmore_icon', array(
		'default'        => '#787878',
		'sanitize_callback' => 'morphology_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'readmore_icon', array(
		'label'   => esc_html__( 'Read More Icon', 'morphology-lite' ),
		'section' => 'colors',
		'settings'   => 'readmore_icon',
		'priority' => 30,			
	) ) );

// read more button hover
 	$wp_customize->add_setting( 'readmore_icon_hbg', array(
		'default'        => '#beb27a',
		'sanitize_callback' => 'morphology_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'readmore_icon_hbg', array(
		'label'   => esc_html__( 'Read More Icon Button Background on Hover', 'morphology-lite' ),
		'section' => 'colors',
		'settings'   => 'readmore_icon_hbg',
		'priority' => 31,			
	) ) );	

// read more button border hover
 	$wp_customize->add_setting( 'readmore_hborder', array(
		'default'        => '#cbcbcb',
		'sanitize_callback' => 'morphology_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'readmore_hborder', array(
		'label'   => esc_html__( 'Read More Icon Border on Hover', 'morphology-lite' ),
		'section' => 'colors',
		'settings'   => 'readmore_hborder',
		'priority' => 32,			
	) ) );

// read more button icon hover
 	$wp_customize->add_setting( 'readmore_hicon', array(
		'default'        => '#787878',
		'sanitize_callback' => 'morphology_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'readmore_hicon', array(
		'label'   => esc_html__( 'Read More Icon on Hover', 'morphology-lite' ),
		'section' => 'colors',
		'settings'   => 'readmore_hicon',
		'priority' => 33,			
	) ) );	
	
// default search button
 	$wp_customize->add_setting( 'search_button_bg', array(
		'default'        => '#beb27a',
		'sanitize_callback' => 'morphology_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'search_button_bg', array(
		'label'   => esc_html__( 'Search Button Colour', 'morphology-lite' ),
		'section' => 'colors',
		'settings'   => 'search_button_bg',
		'priority' => 34,			
	) ) );		

// default search button text
 	$wp_customize->add_setting( 'search_button_text', array(
		'default'        => '#fff',
		'sanitize_callback' => 'morphology_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'search_button_text', array(
		'label'   => esc_html__( 'Search Button Text', 'morphology-lite' ),
		'section' => 'colors',
		'settings'   => 'search_button_text',
		'priority' => 35,			
	) ) );		
	
// default button
 	$wp_customize->add_setting( 'button_bg', array(
		'default'        => '#fff',
		'sanitize_callback' => 'morphology_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'button_bg', array(
		'label'   => esc_html__( 'Button Background', 'morphology-lite' ),
		'section' => 'colors',
		'settings'   => 'button_bg',
		'priority' => 36,			
	) ) );		
	
// default button text
 	$wp_customize->add_setting( 'button_text', array(
		'default'        => '#505050',
		'sanitize_callback' => 'morphology_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'button_text', array(
		'label'   => esc_html__( 'Button Text', 'morphology-lite' ),
		'section' => 'colors',
		'settings'   => 'button_text',
		'priority' => 37,			
	) ) );		
	
// default button border
 	$wp_customize->add_setting( 'button_border', array(
		'default'        => '#c4c4c4',
		'sanitize_callback' => 'morphology_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'button_border', array(
		'label'   => esc_html__( 'Button Border', 'morphology-lite' ),
		'section' => 'colors',
		'settings'   => 'button_border',
		'priority' => 38,			
	) ) );			
	
// default button hover
 	$wp_customize->add_setting( 'button_hbg', array(
		'default'        => '#303030',
		'sanitize_callback' => 'morphology_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'button_hbg', array(
		'label'   => esc_html__( 'Button Background on Hover', 'morphology-lite' ),
		'section' => 'colors',
		'settings'   => 'button_hbg',
		'priority' => 39,			
	) ) );		
	
// default button text hover
 	$wp_customize->add_setting( 'button_htext', array(
		'default'        => '#f3f3f3',
		'sanitize_callback' => 'morphology_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'button_htext', array(
		'label'   => esc_html__( 'Button Text on Hover', 'morphology-lite' ),
		'section' => 'colors',
		'settings'   => 'button_htext',
		'priority' => 40,			
	) ) );		
	
// default button border hover
 	$wp_customize->add_setting( 'button_hborder', array(
		'default'        => '#303030',
		'sanitize_callback' => 'morphology_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'button_hborder', array(
		'label'   => esc_html__( 'Button Border on Hover', 'morphology-lite' ),
		'section' => 'colors',
		'settings'   => 'button_hborder',
		'priority' => 41,			
	) ) );				

	
// mobile menu button
 	$wp_customize->add_setting( 'mobile_menu_button', array(
		'default'        => '#3f3f3f',
		'sanitize_callback' => 'morphology_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mobile_menu_button', array(
		'label'   => esc_html__( 'Mobile Menu Button Background', 'morphology-lite' ),
		'section' => 'colors',
		'settings'   => 'mobile_menu_button',
		'priority' => 42,			
	) ) );		

// mobile menu button text
 	$wp_customize->add_setting( 'mobile_menu_button_text', array(
		'default'        => '#fff',
		'sanitize_callback' => 'morphology_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mobile_menu_button_text', array(
		'label'   => esc_html__( 'Mobile Menu Button Text', 'morphology-lite' ),
		'section' => 'colors',
		'settings'   => 'mobile_menu_button_text',
		'priority' => 43,			
	) ) );	
	
// mobile menu button on hover
 	$wp_customize->add_setting( 'mobile_menu_hbutton', array(
		'default'        => '#535353',
		'sanitize_callback' => 'morphology_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mobile_menu_hbutton', array(
		'label'   => esc_html__( 'Mobile Menu Button Background on Hover', 'morphology-lite' ),
		'section' => 'colors',
		'settings'   => 'mobile_menu_hbutton',
		'priority' => 44,			
	) ) );		
	
// mobile menu button text on hover
 	$wp_customize->add_setting( 'mobile_menu_button_htext', array(
		'default'        => '#fff',
		'sanitize_callback' => 'morphology_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mobile_menu_button_htext', array(
		'label'   => esc_html__( 'Mobile Menu Button Text on Hover', 'morphology-lite' ),
		'section' => 'colors',
		'settings'   => 'mobile_menu_button_htext',
		'priority' => 45,			
	) ) );		
	
// mobile menu background
 	$wp_customize->add_setting( 'mobile_menu_background', array(
		'default'        => '#000',
		'sanitize_callback' => 'morphology_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mobile_menu_background', array(
		'label'   => esc_html__( 'Mobile Menu Background', 'morphology-lite' ),
		'section' => 'colors',
		'settings'   => 'mobile_menu_background',
		'priority' => 46,			
	) ) );		
	
// mobile menu links
 	$wp_customize->add_setting( 'mobile_menu_links', array(
		'default'        => '#fff',
		'sanitize_callback' => 'morphology_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mobile_menu_links', array(
		'label'   => esc_html__( 'Mobile Menu Links', 'morphology-lite' ),
		'section' => 'colors',
		'settings'   => 'mobile_menu_links',
		'priority' => 47,			
	) ) );	

// mobile menu links hover
 	$wp_customize->add_setting( 'mobile_menu_hlinks', array(
		'default'        => '#b8a138',
		'sanitize_callback' => 'morphology_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mobile_menu_hlinks', array(
		'label'   => esc_html__( 'Mobile Menu Link on Hover and Active', 'morphology-lite' ),
		'section' => 'colors',
		'settings'   => 'mobile_menu_hlinks',
		'priority' => 48,			
	) ) );	
	
// mobile menu link borders
 	$wp_customize->add_setting( 'mobile_menu_borders', array(
		'default'        => '#2a2a2a',
		'sanitize_callback' => 'morphology_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mobile_menu_borders', array(
		'label'   => esc_html__( 'Mobile Menu Link Borders', 'morphology-lite' ),
		'section' => 'colors',
		'settings'   => 'mobile_menu_borders',
		'priority' => 49,			
	) ) );		

// main menu links
 	$wp_customize->add_setting( 'main_menu_links', array(
		'default'        => '#000',
		'sanitize_callback' => 'morphology_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_menu_links', array(
		'label'   => esc_html__( 'Main Menu Link Colour', 'morphology-lite' ),
		'section' => 'colors',
		'settings'   => 'main_menu_links',
		'priority' => 50,			
	) ) );		

// main menu links
 	$wp_customize->add_setting( 'main_menu_submenu_bg', array(
		'default'        => '#000',
		'sanitize_callback' => 'morphology_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_menu_submenu_bg', array(
		'label'   => esc_html__( 'Main Menu Submenu Background Colour', 'morphology-lite' ),
		'section' => 'colors',
		'settings'   => 'main_menu_submenu_bg',
		'priority' => 51,			
	) ) );		
	
// main menu submenu links
 	$wp_customize->add_setting( 'main_menu_submenu_links', array(
		'default'        => '#fff',
		'sanitize_callback' => 'morphology_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_menu_submenu_links', array(
		'label'   => esc_html__( 'Main Menu Submenu Link Colour', 'morphology-lite' ),
		'section' => 'colors',
		'settings'   => 'main_menu_submenu_links',
		'priority' => 52,			
	) ) );		
	
// main menu hover and active
 	$wp_customize->add_setting( 'main_menu_hover_active', array(
		'default'        => '#b8a138',
		'sanitize_callback' => 'morphology_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_menu_hover_active', array(
		'label'   => esc_html__( 'Main Menu Hover and Active Colour', 'morphology-lite' ),
		'section' => 'colors',
		'settings'   => 'main_menu_hover_active',
		'priority' => 53,			
	) ) );		
	
// wordpress gallery captions
 	$wp_customize->add_setting( 'gallery_caption_bg', array(
		'default'        => '#beb27a',
		'sanitize_callback' => 'morphology_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'gallery_caption_bg', array(
		'label'   => esc_html__( 'WP Gallery Caption Background', 'morphology-lite' ),
		'section' => 'colors',
		'settings'   => 'gallery_caption_bg',
		'priority' => 54,			
	) ) );		
	
// wordpress gallery caption text
 	$wp_customize->add_setting( 'gallery_caption_text', array(
		'default'        => '#fff',
		'sanitize_callback' => 'morphology_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'gallery_caption_text', array(
		'label'   => esc_html__( 'WP Gallery Caption Text', 'morphology-lite' ),
		'section' => 'colors',
		'settings'   => 'gallery_caption_text',
		'priority' => 55,			
	) ) );		
	
// image post hover bg
 	$wp_customize->add_setting( 'image_post_hover_bg', array(
		'default'        => '#beb27a',
		'sanitize_callback' => 'morphology_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'image_post_hover_bg', array(
		'label'   => esc_html__( 'Image Post Format Hover Background', 'morphology-lite' ),
		'section' => 'colors',
		'settings'   => 'image_post_hover_bg',
		'priority' => 56,			
	) ) );		
	
// image post hover text
 	$wp_customize->add_setting( 'image_post_hover_text', array(
		'default'        => '#fff',
		'sanitize_callback' => 'morphology_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'image_post_hover_text', array(
		'label'   => esc_html__( 'Image Post Format Hover Text', 'morphology-lite' ),
		'section' => 'colors',
		'settings'   => 'image_post_hover_text',
		'priority' => 57,			
	) ) );		
	
// error page text
 	$wp_customize->add_setting( 'error_page_text', array(
		'default'        => '#fff',
		'sanitize_callback' => 'morphology_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'error_page_text', array(
		'label'   => esc_html__( 'Error Page Text Colour', 'morphology-lite' ),
		'section' => 'colors',
		'settings'   => 'error_page_text',
		'priority' => 58,			
	) ) );		
	
// error page button background
 	$wp_customize->add_setting( 'error_page_button_bg', array(
		'default'        => '#beb27a',
		'sanitize_callback' => 'morphology_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'error_page_button_bg', array(
		'label'   => esc_html__( 'Error Page Button Background Colour', 'morphology-lite' ),
		'section' => 'colors',
		'settings'   => 'error_page_button_bg',
		'priority' => 59,			
	) ) );	
	
// error page button text
 	$wp_customize->add_setting( 'error_page_button_text', array(
		'default'        => '#fff',
		'sanitize_callback' => 'morphology_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'error_page_button_text', array(
		'label'   => esc_html__( 'Error Page Button Text Colour', 'morphology-lite' ),
		'section' => 'colors',
		'settings'   => 'error_page_button_text',
		'priority' => 60,			
	) ) );		
	
// error page button background hover
 	$wp_customize->add_setting( 'error_page_button_hbg', array(
		'default'        => '#fff',
		'sanitize_callback' => 'morphology_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'error_page_button_hbg', array(
		'label'   => esc_html__( 'Error Page Button Background Colour on Hover', 'morphology-lite' ),
		'section' => 'colors',
		'settings'   => 'error_page_button_hbg',
		'priority' => 61,			
	) ) );	

// error page button text hover
 	$wp_customize->add_setting( 'error_page_button_htext', array(
		'default'        => '#333',
		'sanitize_callback' => 'morphology_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'error_page_button_htext', array(
		'label'   => esc_html__( 'Error Page Button Text Colour on Hover', 'morphology-lite' ),
		'section' => 'colors',
		'settings'   => 'error_page_button_htext',
		'priority' => 62,			
	) ) );

// featured label
 	$wp_customize->add_setting( 'featured_label', array(
		'default'        => '#c5b256',
		'sanitize_callback' => 'morphology_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'featured_label', array(
		'label'   => esc_html__( 'Featured Label Colour', 'morphology-lite' ),
		'section' => 'colors',
		'settings'   => 'featured_label',
		'priority' => 63,			
	) ) );
	
// image attachment page background
 	$wp_customize->add_setting( 'attachment_page_bg', array(
		'default'        => '#212121',
		'sanitize_callback' => 'morphology_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'attachment_page_bg', array(
		'label'   => esc_html__( 'Attachment Page Image Background', 'morphology-lite' ),
		'section' => 'colors',
		'settings'   => 'attachment_page_bg',
		'priority' => 64,			
	) ) );	
	
// image attachment page navigation
 	$wp_customize->add_setting( 'attachment_page_nav', array(
		'default'        => '#beb27a',
		'sanitize_callback' => 'morphology_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'attachment_page_nav', array(
		'label'   => esc_html__( 'Attachment Page Image Navigation', 'morphology-lite' ),
		'section' => 'colors',
		'settings'   => 'attachment_page_nav',
		'priority' => 65,			
	) ) );	

// blockquote border
 	$wp_customize->add_setting( 'blockquote_border', array(
		'default'        => '#b7aa6f',
		'sanitize_callback' => 'morphology_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blockquote_border', array(
		'label'   => esc_html__( 'Blockquote Border', 'morphology-lite' ),
		'section' => 'colors',
		'settings'   => 'blockquote_border',
		'priority' => 66,			
	) ) );
	
// blockquotes
 	$wp_customize->add_setting( 'blockquote_text', array(
		'default'        => '#b7aa6f',
		'sanitize_callback' => 'morphology_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blockquote_text', array(
		'label'   => esc_html__( 'Blockquote Text', 'morphology-lite' ),
		'section' => 'colors',
		'settings'   => 'blockquote_text',
		'priority' => 67,			
	) ) );	

// banner border
 	$wp_customize->add_setting( 'banner_border', array(
		'default'        => '#eee',
		'sanitize_callback' => 'morphology_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'banner_border', array(
		'label'   => esc_html__( 'Banner Bottom Border', 'morphology-lite' ),
		'section' => 'colors',
		'settings'   => 'banner_border',
		'priority' => 68,			
	) ) );
	
// blog pagination background
 	$wp_customize->add_setting( 'blog_pagination_bg', array(
		'default'        => '#f1f1f1',
		'sanitize_callback' => 'morphology_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blog_pagination_bg', array(
		'label'   => esc_html__( 'Blog Pagination Background', 'morphology-lite' ),
		'section' => 'colors',
		'settings'   => 'blog_pagination_bg',
		'priority' => 68,			
	) ) );	

// blog pagination link colour
 	$wp_customize->add_setting( 'blog_pagination_link', array(
		'default'        => '#333',
		'sanitize_callback' => 'morphology_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blog_pagination_link', array(
		'label'   => esc_html__( 'Blog Pagination Link Colour', 'morphology-lite' ),
		'section' => 'colors',
		'settings'   => 'blog_pagination_link',
		'priority' => 69,			
	) ) );	

// blog pagination link hover colour
 	$wp_customize->add_setting( 'blog_pagination_hlink', array(
		'default'        => '#b8a138',
		'sanitize_callback' => 'morphology_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blog_pagination_hlink', array(
		'label'   => esc_html__( 'Blog Pagination Link Colour on Hover', 'morphology-lite' ),
		'section' => 'colors',
		'settings'   => 'blog_pagination_hlink',
		'priority' => 70,			
	) ) );	
	  
		
/*
 * Add more settings to our theme customizer
 * Section header_image
 */	
	
// Setting group for the side column background size
	$wp_customize->add_setting( 'header_bg_size', array(
		'default' => 'auto',
		'sanitize_callback' => 'morphology_lite_sanitize_bg_size',
	) );  
	$wp_customize->add_control( 'header_bg_size', array(
		  'type' => 'radio',
		  'label' => esc_html__( 'Header Background size', 'morphology-lite' ),
		  'section' => 'header_image',
		  'priority' => 12,
		  'choices' => array(
			  'auto' => esc_html__( 'Auto', 'morphology-lite' ),
			  'cover' => esc_html__( 'Cover', 'morphology-lite' ),
			  'contain' => esc_html__( 'Contain', 'morphology-lite' ),
	) ) );	
	
// Setting group for the side column background position
	$wp_customize->add_setting( 'header_bg_position', array(
		'default' => 'bottom',
		'sanitize_callback' => 'morphology_lite_sanitize_bg_position',
	) );  
	$wp_customize->add_control( 'header_bg_position', array(
		  'type' => 'radio',
		  'label' => esc_html__( 'Header Background Position', 'morphology-lite' ),
		  'section' => 'header_image',
		  'priority' => 13,
		  'choices' => array(
			  'top' => esc_html__( 'Top', 'morphology-lite' ),
			  'bottom' => esc_html__( 'Bottom', 'morphology-lite' ),
			  'center' => esc_html__( 'Center', 'morphology-lite' ),
	) ) );	
	
// Setting group for the side column repeat 
	$wp_customize->add_setting( 'header_bg_repeat', array(
		'default' => 'no-repeat',
		'sanitize_callback' => 'morphology_lite_sanitize_header_bg_repeat',
	) );  
	$wp_customize->add_control( 'header_bg_repeat', array(
		  'type' => 'radio',
		  'label' => esc_html__( 'Header Background Repeat', 'morphology-lite' ),
		  'section' => 'header_image',
		  'priority' => 14,
		  'choices' => array(
			  'no-repeat' => esc_html__( 'No Repeat', 'morphology-lite' ),
			  'repeat' => esc_html__( 'Repeat', 'morphology-lite' ),
			  'repeat-x' => esc_html__( 'Repeat Across', 'morphology-lite' ),
			  'repeat-y' => esc_html__( 'Repeat Down', 'morphology-lite' ),
	) ) );		

	
/*
 * Body Background Image
 * Add  settings to our theme customizer
 */
	$wp_customize->add_setting( 'body_bg_image_size', array(
		'default' => 'cover',
		'sanitize_callback' => 'morphology_lite_sanitize_background_size'
		)
	);
	$wp_customize->add_control( 'body_bg_image_size', array(
		  'type' => 'radio',
		  'label' => esc_html__( 'Background Size', 'morphology-lite' ),
		  'section' => 'background_image',
		  'choices' => array(
			  'auto' => esc_html__( 'Auto', 'morphology-lite' ),
			  'cover' => esc_html__( 'Cover', 'morphology-lite' ),
			  'contain' => esc_html__( 'Contain', 'morphology-lite' ),
	 ) ) );	


		
// ADD A TYPOGRAPHY SECTION
  $wp_customize->add_section( 'typography_options', array(
      'title' => __( 'Typography Options', 'morphology-lite' ),
	  'description' => __('This theme is setup to use Google Fonts and the Raleway font is the default font for headings. You can use these typography settings or use a font plugin for more flexibility.', 'morphology-lite'),
	  'priority' => 83,
    )  ); 
	
// Setting group to show the site title  
  	$wp_customize->add_setting( 'load_cyrillic_subset',  array(
		'default' => 0,
		'sanitize_callback' => 'morphology_lite_sanitize_checkbox'
   	 ) );  
 	 $wp_customize->add_control( 'load_cyrillic_subset', array(
		'type'     => 'checkbox',
		'section'  => 'typography_options',
		'priority' => 1,
		'label'    => __( 'Load Cyrillic Font Subsets', 'morphology-lite' ),
		'description' => __( 'If you need the Cyrillic font subsets loaded for the included Google Fonts of Raleway and your custom fonts, then check this box.', 'morphology-lite' ),
 	 ) );	
 
// Setting group for the main body font
	$wp_customize->add_setting( 'second_google_font', array(
		'default' => '',
		'sanitize_callback' => 'morphology_lite_sanitize_text',
	) );
	$wp_customize->add_control( 'second_google_font', array(
		'settings' => 'second_google_font',
		'label'    => __( 'Add a Second Google Font', 'morphology-lite' ),
		'description' => __( 'This will add a second Google font to your website.', 'morphology-lite' ),
		'section'  => 'typography_options',		
		'type'     => 'text',
		'priority' => 3,
	) );

// Setting group for the heading font
	$wp_customize->add_setting( 'third_google_font', array(
		'default' => '',
		'sanitize_callback' => 'morphology_lite_sanitize_text',
	) );
	$wp_customize->add_control( 'third_google_font', array(
		'settings' => 'third_google_font',
		'label'    => __( 'Add a Third Google Font', 'morphology-lite' ),
		'description' => __( 'This will add a third Google Font to your website.', 'morphology-lite' ),
		'section'  => 'typography_options',		
		'type'     => 'text',
		'priority' => 4,
	) );	 
			
// Setting group for the Site Title font size
	$wp_customize->add_setting( 'site_title_size', array(
		'default'        => '1.5',
		'sanitize_callback' => 'morphology_lite_sanitize_decimals',
	) );
	$wp_customize->add_control( 'site_title_size', array(
		'settings' => 'site_title_size',
		'label'    => esc_html__( 'Site Title Font Size', 'morphology-lite' ),
		'description' => __( 'This will change the site title font size in rem units. By default, the site title is using 1.5rem as the size, so you would enter in: 1.5 in this field.', 'morphology-lite' ),
		'section'  => 'typography_options',		
		'type'     => 'text',
		'priority' => 5,
	) );		
		
// Setting group for the main content font size
	$wp_customize->add_setting( 'main_content_size', array(
		'default'        => '0.813',
		'sanitize_callback' => 'morphology_lite_sanitize_decimals',
	) );
	$wp_customize->add_control( 'main_content_size', array(
		'settings' => 'main_content_size',
		'label'    => esc_html__( 'Content Font Size', 'morphology-lite' ),
		'description' => __( 'This will change the main content area font size in rem units. By default, the site title is using 0.813 as the size, so you would enter in: 0.813 in this field.', 'morphology-lite' ),
		'section'  => 'typography_options',		
		'type'     => 'text',
		'priority' => 6,
	) );			

// Setting group for h1
	$wp_customize->add_setting( 'h1_font_size', array(
		'default'        => '1.938',
		'sanitize_callback' => 'morphology_lite_sanitize_decimals',
	) );
	$wp_customize->add_control( 'h1_font_size', array(
		'settings' => 'h1_font_size',
		'label'    => esc_html__( 'H1 Font Size', 'morphology-lite' ),
		'description' => __( 'This will change the font size for heading 1 (h1) in rem units. By default, the font size is 1.938rem, so you would enter in: 1.938 in this field.', 'morphology-lite' ),
		'section'  => 'typography_options',		
		'type'     => 'text',
		'priority' => 7,
	) );

// Setting group for h2
	$wp_customize->add_setting( 'h2_font_size', array(
		'default'        => '1.75',
		'sanitize_callback' => 'morphology_lite_sanitize_decimals',
	) );
	$wp_customize->add_control( 'h2_font_size', array(
		'settings' => 'h2_font_size',
		'label'    => esc_html__( 'H2 Font Size', 'morphology-lite' ),
		'description' => __( 'This will change the font size for heading 2 in rem units. By default, the font size is 1.75rem, so you would enter in: 1.75 in this field.', 'morphology-lite' ),
		'section'  => 'typography_options',		
		'type'     => 'text',
		'priority' => 7,
	) );
	// Setting group for h3
	$wp_customize->add_setting( 'h3_font_size', array(
		'default'        => '1.375',
		'sanitize_callback' => 'morphology_lite_sanitize_decimals',
	) );
	$wp_customize->add_control( 'h3_font_size', array(
		'settings' => 'h3_font_size',
		'label'    => esc_html__( 'H3 Font Size', 'morphology-lite' ),
		'description' => __( 'This will change the font size for heading 3 in rem units. By default, the font size is 1.375rem, so you would enter in: 1.375 in this field.', 'morphology-lite' ),
		'section'  => 'typography_options',		
		'type'     => 'text',
		'priority' => 7,
	) );
	// Setting group for h4
	$wp_customize->add_setting( 'h4_font_size', array(
		'default'        => '1.25',
		'sanitize_callback' => 'morphology_lite_sanitize_decimals',
	) );
	$wp_customize->add_control( 'h4_font_size', array(
		'settings' => 'h4_font_size',
		'label'    => esc_html__( 'H4 Font Size', 'morphology-lite' ),
		'description' => __( 'This will change the font size for heading 4 in rem units. By default, the font size is 1.25rem, so you would enter in: 1.25rem in this field.', 'morphology-lite' ),
		'section'  => 'typography_options',		
		'type'     => 'text',
		'priority' => 7,
	) );
	// Setting group for h5
	$wp_customize->add_setting( 'h5_font_size', array(
		'default'        => '1',
		'sanitize_callback' => 'morphology_lite_sanitize_decimals',
	) );
	$wp_customize->add_control( 'h5_font_size', array(
		'settings' => 'h5_font_size',
		'label'    => esc_html__( 'H5 Font Size', 'morphology-lite' ),
		'description' => __( 'This will change the font size for heading 5 in rem units. By default, the font size is 1rem, so you would enter in: 1 in this field.', 'morphology-lite' ),
		'section'  => 'typography_options',		
		'type'     => 'text',
		'priority' => 7,
	) );
	// Setting group for h6
	$wp_customize->add_setting( 'h6_font_size', array(
		'default'        => '0.875',
		'sanitize_callback' => 'morphology_lite_sanitize_decimals',
	) );
	$wp_customize->add_control( 'h6_font_size', array(
		'settings' => 'h6_font_size',
		'label'    => esc_html__( 'H6 Font Size', 'morphology-lite' ),
		'description' => __( 'This will change the font size for heading 6 in rem units. By default, the font size is 0.875rem, so you would enter in: 0.875 in this field.', 'morphology-lite' ),
		'section'  => 'typography_options',		
		'type'     => 'text',
		'priority' => 7,
	) );

// Setting group for the widget font size
	$wp_customize->add_setting( 'font_size_widgets', array(
		'default'        => '0.813',
		'sanitize_callback' => 'morphology_lite_sanitize_decimals',
	) );
	$wp_customize->add_control( 'font_size_widgets', array(
		'settings' => 'font_size_widgets',
		'label'    => esc_html__( 'Widget Font Size', 'morphology-lite' ),
		'description' => __( 'This will change the widget text font size in rem units. By default, the site title is using 0.813rem as the size, so you would enter in: 0.813 in this field.', 'morphology-lite' ),
		'section'  => 'typography_options',		
		'type'     => 'text',
		'priority' => 16,
	) );			

// Setting group for the widget title font size
	$wp_customize->add_setting( 'font_size_widget_title', array(
		'default'        => '1.375',
		'sanitize_callback' => 'morphology_lite_sanitize_decimals',
	) );
	$wp_customize->add_control( 'font_size_widget_title', array(
		'settings' => 'font_size_widget_title',
		'label'    => esc_html__( 'Widget Title Font Size', 'morphology-lite' ),
		'description' => __( 'This will change the widget title font size in rem units. By default, the site title is using 1.375rem as the size, so you would enter in: 1.375 in this field.', 'morphology-lite' ),
		'section'  => 'typography_options',		
		'type'     => 'text',
		'priority' => 17,
	) );	
// Setting group for the bottom sidebar widget title font size
	$wp_customize->add_setting( 'font_size_bottom_widget_title', array(
		'default'        => '1.25',
		'sanitize_callback' => 'morphology_lite_sanitize_decimals',
	) );
	$wp_customize->add_control( 'font_size_bottom_widget_title', array(
		'settings' => 'font_size_bottom_widget_title',
		'label'    => esc_html__( 'Botom Widget Title Font Size', 'morphology-lite' ),
		'description' => __( 'This will change the bottom sidebar widget title font size in rem units. By default, the site title is using 1.25rem as the size, so you would enter in: 1.25 in this field.', 'morphology-lite' ),
		'section'  => 'typography_options',		
		'type'     => 'text',
		'priority' => 18,
	) );		

// Setting group for the blog entry title font size
	$wp_customize->add_setting( 'blog_entry_title_size', array(
		'default'        => '1.75',
		'sanitize_callback' => 'morphology_lite_sanitize_decimals',
	) );
	$wp_customize->add_control( 'blog_entry_title_size', array(
		'settings' => 'blog_entry_title_size',
		'label'    => esc_html__( 'Blog Summary Title Font Size', 'morphology-lite' ),
		'description' => __( 'This will change the blog summary title font size in rem units. By default, the site title is using 1.75rem as the size, so you would enter in: 1.75 in this field.', 'morphology-lite' ),
		'section'  => 'typography_options',		
		'type'     => 'text',
		'priority' => 19,
	) );

// Setting group for the main menu font size
	$wp_customize->add_setting( 'menu_font_size', array(
		'default'        => '0.813',
		'sanitize_callback' => 'morphology_lite_sanitize_decimals',
	) );
	$wp_customize->add_control( 'menu_font_size', array(
		'settings' => 'menu_font_size',
		'label'    => esc_html__( 'Main Menu Font Size', 'morphology-lite' ),
		'description' => __( 'This will change the main menu font size in rem units. By default, the site title is using 0.813rem as the size, so you would enter in: 0.813 in this field.', 'morphology-lite' ),
		'section'  => 'typography_options',		
		'type'     => 'text',
		'priority' => 20,
	) );

 
	 
	 
	
}
add_action( 'customize_register', 'morphology_lite_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function morphology_lite_customize_preview_js() {
	wp_enqueue_script( 'morphology_lite_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'morphology_lite_customize_preview_js' );




/******************* This is our theme sanitization settings ************************
		Remember to sanitize any additional theme settings you add to the customizer.
**************************************************************************/
 
// adds sanitization callback function : checkbox
if ( ! function_exists( 'morphology_lite_sanitize_checkbox' ) ) :
	function morphology_lite_sanitize_checkbox( $input ) {
		if ( $input == 1 ) {
			return 1;
		} else {
			return '';
		}
	}	 
endif;


// adds sanitization callback function for page background size
if ( ! function_exists( 'morphology_lite_sanitize_background_size' ) ) :
  function morphology_lite_sanitize_background_size( $value ) {
    $background_sizes = array( 'auto', 'cover', 'contain' );
    if ( ! in_array( $value, $background_sizes ) ) {
      $value = 'cover';
    }

    return $value;
  }
endif;

// adds sanitization callback function : text 
if ( ! function_exists( 'morphology_lite_sanitize_text' ) ) :
	function morphology_lite_sanitize_text( $input ) {
		return wp_kses_post( force_balance_tags( $input ) );
	}
endif;

// adds sanitization callback function : colours
if ( ! function_exists( 'morphology_lite_sanitize_hex_colour' ) ) :
	function morphology_lite_sanitize_hex_colour( $color ) {
		if ( $unhashed = sanitize_hex_color_no_hash( $color ) )
			return '#' . $unhashed;
	
		return $color;
	}
endif;

// adds sanitization callback function : absolute integer
if ( ! function_exists( 'morphology_lite_sanitize_integer' ) ) :
function morphology_lite_sanitize_integer( $input ) {
	return absint( $input );
}
endif;

// adds sanitization callback function for numeric data : decimals
if ( ! function_exists( 'morphology_lite_sanitize_decimals' ) ) :
function morphology_lite_sanitize_decimals( $input ) {
	$decimal = floatval( $input );
	return $decimal;
}
endif;
// adds sanitization callback function for blog style
if ( ! function_exists( 'morphology_lite_sanitize_blogstyle' ) ) :
  function morphology_lite_sanitize_blogstyle( $value ) {
    $blog_style = array( 'blogstyle1', 'blogstyle2', 'blogstyle3','blogstyle4' );
    if ( ! in_array( $value, $blog_style ) ) {
      $value = 'blogstyle2';
    }

    return $value;
  }
endif;


// adds sanitization callback function for single style
if ( ! function_exists( 'morphology_lite_sanitize_singlestyle' ) ) :
  function morphology_lite_sanitize_singlestyle( $value ) {
    $single_style = array( 'singlestyle1', 'singlestyle2', 'singlestyle3' );
    if ( ! in_array( $value, $single_style ) ) {
      $value = 'singlestyle1';
    }

    return $value;
  }
endif;





// adds sanitization callback function for the excerpt : radio
	function morphology_lite_sanitize_excerpt( $input ) {
		$valid = array(
			'content' => esc_html__( 'Content', 'morphology-lite' ),
			'excerpt' => esc_html__( 'Excerpt', 'morphology-lite' ),
		);
	 
		if ( array_key_exists( $input, $valid ) ) {
			return $input;
		} else {
			return '';
		}
	}

		
// adds sanitization callback function for header background size
if ( ! function_exists( 'morphology_lite_sanitize_bg_size' ) ) :
  function morphology_lite_sanitize_bg_size( $value ) {
    $background_sizes = array( 'auto', 'cover', 'contain' );
    if ( ! in_array( $value, $background_sizes ) ) {
      $value = 'auto';
    }

    return $value;
  }
endif;

// adds sanitization callback function for header background position
if ( ! function_exists( 'morphology_lite_sanitize_bg_position' ) ) :
  function morphology_lite_sanitize_bg_position( $value ) {
    $background_position = array( 'top', 'bottom', 'center' );
    if ( ! in_array( $value, $background_position ) ) {
      $value = 'bottom';
    }

    return $value;
  }
endif;	

// adds sanitization callback function for header background repeat
if ( ! function_exists( 'morphology_lite_sanitize_header_bg_repeat' ) ) :
  function morphology_lite_sanitize_header_bg_repeat( $value ) {
    $background_repeat = array( 'no-repeat', 'repeat', 'repeat-x','repeat-y' );
    if ( ! in_array( $value, $background_repeat ) ) {
      $value = 'no-repeat';
    }

    return $value;
  }
endif;
