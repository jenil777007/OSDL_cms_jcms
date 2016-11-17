<?php
/**
 * Add inline styles to the head area
 * These styles represents options from the customizer
 * @package Morphology Lite
 */
 
 // Dynamic styles
function morphology_lite_inline_styles($custom) {
	
// BEGIN CUSTOM CSS


	// body background colour
		$body_bg = get_theme_mod( 'body_bg', '#f1f1f1' );
		$body_text = get_theme_mod( 'body_text', '#333' );
		$body_bg_image_size = get_theme_mod( 'body_bg_image_size', 'cover' );
		$custom .= "body {background-color:" . esc_attr($body_bg) . "; color:" . esc_attr($body_text) . "; }
		body.custom-background {background-size:" . esc_attr($body_bg_image_size) . "; }"."\n";

	// body background colour
		$content_bg = get_theme_mod( 'content_bg', '#fff' );
		$custom .= ".page .site-main, .single .site-main, .search .site-main {background-color:" . esc_attr($content_bg) . "; }"."\n";

		
	// content background colour
		$content_bg = get_theme_mod( 'content_bg', '#fff' );
		$custom .= ".page .site-main, .single .site-main, .search .site-main {background-color:" . esc_attr($content_bg) . "; }"."\n";

// typography	
	$site_title_size = get_theme_mod( 'site_title_size', '1.5' );
	$main_content_size = get_theme_mod( 'main_content_size', '0.813' );	
	$h1_font_size = get_theme_mod( 'h1_font_size', '1.938' );
	$h2_font_size = get_theme_mod( 'h2_font_size', '1.75' );
	$h3_font_size = get_theme_mod( 'h3_font_size', '1.375' );
	$h4_font_size = get_theme_mod( 'h4_font_size', '1.25' );
	$h5_font_size = get_theme_mod( 'h5_font_size', '1' );
	$h6_font_size = get_theme_mod( 'h6_font_size', '0.875' );	
	$font_size_widgets = get_theme_mod( 'font_size_widgets', '0.813' );	
	$font_size_widget_title = get_theme_mod( 'font_size_widget_title', '1.375' );	
	$font_size_bottom_widget_title = get_theme_mod( 'font_size_bottom_widget_title', '1.25' );	
	$blog_entry_title_size = get_theme_mod( 'blog_entry_title_size', '1.75' );
	$menu_font_size = get_theme_mod( 'menu_font_size', '0.813' );
	$submenu_font_size = get_theme_mod( 'submenu_font_size', '0.875' );
	$custom .= "body {font-size: " . esc_attr($main_content_size) . "rem;}	
	.site-title {font-size: " . esc_attr($site_title_size) . "rem;}
	h1 {font-size: " . esc_attr($h1_font_size) . "rem;}
	h2 {font-size: " . esc_attr($h2_font_size) . "rem;}
	h3 {font-size: " . esc_attr($h3_font_size) . "rem;}
	h4 {font-size: " . esc_attr($h4_font_size) . "rem;}
	h5 {font-size: " . esc_attr($h5_font_size) . "rem;}
	h6 {font-size: " . esc_attr($h6_font_size) . "rem;}	
	.blog .entry-title, .archive .entry-title {font-size: " . esc_attr($blog_entry_title_size) . "rem;}
	.widget {font-size: " . esc_attr($font_size_widgets) . "rem;}
	.widget-title {font-size: " . esc_attr($font_size_widget_title) . "rem;}
	#sidebar-bottom .widget-title {font-size: " . esc_attr($font_size_bottom_widget_title) . "rem;}
	.main-navigation {font-size: " . esc_attr($menu_font_size) . "rem;}
	.main-navigation ul ul {font-size: " . esc_attr($menu_font_size) . "rem;}"."\n";

	
	// banner bottom border
		$banner_border = get_theme_mod( 'banner_border', '#eee' );
		$custom .= "#sidebar-banner {border-color:" . esc_attr($banner_border) . "; }"."\n";

	// blog pagination background
		$blog_pagination_bg = get_theme_mod( 'blog_pagination_bg', '#f1f1f1' );
		$blog_pagination_link = get_theme_mod( 'blog_pagination_link', '#333' );
		$blog_pagination_hlink = get_theme_mod( 'blog_pagination_hlink', '#b8a138' );
		$custom .= ".pagination {background-color:" . esc_attr($blog_pagination_bg) . "; }
		.pagination a, .pagination a:visited {color:" . esc_attr($blog_pagination_link) . "; }
		.pagination a:hover {color:" . esc_attr($blog_pagination_hlink) . "; }"."\n";
				
	// content headings colour
		$content_headings = get_theme_mod( 'content_headings', '#333' );
		$blog_post_heading = get_theme_mod( 'blog_post_heading', '#333' );
		$content_link_colour = get_theme_mod( 'content_link_colour', '#b8a138' );
		$custom .= "h1, h2, h3, h4, h5, h6 {color:" . esc_attr($content_headings) . "; }
		.blog .entry-title a, .blog .entry-title a:visited {color:" . esc_attr($blog_post_heading) . "; }
		.blog .entry-title a:hover {color:" . esc_attr($content_link_colour) . "; }"."\n";

	// featured label colour
		$featured_label = get_theme_mod( 'featured_label', '#c5b256' );
		$custom .= ".featured {color:" . esc_attr($featured_label) . "; }"."\n";
		
	// blockquotes
		$blockquote_border = get_theme_mod( 'blockquote_border', '#b7aa6f' );
		$blockquote_text = get_theme_mod( 'blockquote_text', '#b7aa6f' );
		$custom .= "blockquote {border-color:" . esc_attr($blockquote_border) . "; color:" . esc_attr($blockquote_text) . "; }"."\n";
		

	// bottom headings colour
		$bottom_headings = get_theme_mod( 'bottom_headings', '#fff' );
		$custom .= "#sidebar-bottom .widget-title {color:" . esc_attr($bottom_headings) . "; }"."\n";			
		
	// footer text colour
		$footer_text = get_theme_mod( 'footer_text', '#c2c2c2' );
		$footer_bg = get_theme_mod( 'footer_bg', '#191a1c' );
		$custom .= "#footer-wrapper {background-color:" . esc_attr($footer_bg) . "; }
		#footer-wrapper, #footer-wrapper .widget-title, #footer-wrapper a:hover, #footer-menu li:after {color:" . esc_attr($footer_text) . "; }"."\n";			

	// footer links
		$footer_links = get_theme_mod( 'footer_links', '#beb27a' );
		$custom .= "#footer-wrapper a, #footer-wrapper a:visited {color:" . esc_attr($footer_links) . "; }"."\n";			
	
	// content links and widget list borders and post meta info
		$content_link_colour = get_theme_mod( 'content_link_colour', '#b8a138' );
		$content_link_hcolour = get_theme_mod( 'content_link_hcolour', '#333' );
		$content_list_border = get_theme_mod( 'content_list_border', '#e6e6e6' );
		$post_meta_colour = get_theme_mod( 'post_meta_colour', '#919191' );
		$custom .= "a, a:visited {color:" . esc_attr($content_link_colour) . "; }
		a:hover {color:" . esc_attr($content_link_hcolour) . "; }
		.widget li, .widget .tagcloud a {border-color:" . esc_attr($content_list_border) . "; }
		.entry-meta, .entry-meta a, .entry-meta a:visited, .entry-meta span:after {color:" . esc_attr($post_meta_colour) . "; }"."\n";
		
	// bottom text and links
		$bottom_text_colour = get_theme_mod( 'bottom_text_colour', '#ccc' );
		$bottom_link_hcolour = get_theme_mod( 'bottom_link_hcolour', '#cec499' );
		$bottom_list_border = get_theme_mod( 'bottom_list_border', '#444' );
		$custom .= "#sidebar-bottom .widget-title, #sidebar-bottom, #sidebar-bottom a, #sidebar-bottom a:visited, #sidebar-bottom .widget a, #sidebar-bottom .widget a:visited {color:" . esc_attr($bottom_text_colour) . "; }
		#sidebar-bottom a:hover, .#sidebar-bottom .widget a:hover {color:" . esc_attr($bottom_link_hcolour) . "; }
		#sidebar-bottom li, #sidebar-bottom .widget .tagcloud a {border-color:" . esc_attr($bottom_list_border) . "; }"."\n";
		
	// column background colour
		$column_bg = get_theme_mod( 'column_bg', '#fff' );
		$custom .= ".sidebar {background-color:" . esc_attr($column_bg) . "; }"."\n";

	// column top background
		$column_top_bg = get_theme_mod( 'column_top_bg', '' );
		$custom .= "#site-branding {background-color: " . esc_attr($column_top_bg) . ";}"."\n";		

	// column background image styles
		$header_bg_size = get_theme_mod( 'header_bg_size', 'auto' );
		$header_bg_position = get_theme_mod( 'header_bg_position', 'bottom' );
		$header_bg_repeat = get_theme_mod( 'header_bg_repeat', 'no-repeat' );
		//$header_bg_opacity = get_theme_mod( 'header_bg_opacity', '1' );
		$custom .= ".sidebar {background-size: " . esc_attr($header_bg_size) . "; background-position: " . esc_attr($header_bg_position) . "; background-repeat: " . esc_attr($header_bg_repeat) . "; }"."\n";		
			
	// site title colour
		$site_title_colour = get_theme_mod( 'site_title_colour', '#000' );
		$custom .= ".site-title, .site-title a, .site-title a:visited {color:" . esc_attr($site_title_colour) . "; }"."\n";

	// site description colour
		$site_desc_colour = get_theme_mod( 'site_desc_colour', '#797d82' );
		$custom .= ".site-description {color:" . esc_attr($site_desc_colour) . "; }"."\n";

	// column footer site info colour
		$column_site_info = get_theme_mod( 'column_site_info', '#333' );
		$custom .= ".sidebar .site-info {color:" . esc_attr($column_site_info) . "; }"."\n";

	// column social
		$column_social_icon_bg = get_theme_mod( 'column_social_icon_bg', '#beb27a' );
		$column_social_icon = get_theme_mod( 'column_social_icon', '#fff' );
		$column_social_icon_hbg = get_theme_mod( 'column_social_icon_hbg', '#626466' );
		$column_social_hicon = get_theme_mod( 'column_social_hicon', '#fff' );		
		$custom .= ".sidebar .social-icons a {background-color:" . esc_attr($column_social_icon_bg) . "; color:" . esc_attr($column_social_icon) . ";}
		.sidebar .social-icons a:hover {background-color:" . esc_attr($column_social_icon_hbg) . "; color:" . esc_attr($column_social_hicon) . ";}"."\n";

	// content social
		$content_social_icon_bg = get_theme_mod( 'content_social_icon_bg', '#beb27a' );
		$content_social_icon = get_theme_mod( 'content_social_icon', '#fff' );
		$content_social_icon_hbg = get_theme_mod( 'content_social_icon_hbg', '#626466' );
		$content_social_hicon = get_theme_mod( 'content_social_hicon', '#fff' );		
		$custom .= "#footer-wrapper .social-icons a, #footer-wrapper .social-icons a:visited {background-color:" . esc_attr($content_social_icon_bg) . "; color:" . esc_attr($content_social_icon) . ";}
		#footer-wrapper .social-icons a:hover {background-color:" . esc_attr($content_social_icon_hbg) . "; color:" . esc_attr($content_social_hicon) . ";}"."\n";

	// default search button
		$search_button_bg = get_theme_mod( 'search_button_bg', '#beb27a' );
		$search_button_text = get_theme_mod( 'search_button_text', '#fff' );
		$custom .= ".widget .button-search {background-color:" . esc_attr($search_button_bg) . "; color:" . esc_attr($search_button_text) . " }"."\n";

	// default button
		$button_bg = get_theme_mod( 'button_bg', '#fff' );
		$button_text = get_theme_mod( 'button_text', '#505050' );
		$button_border = get_theme_mod( 'button_border', '#c4c4c4' );
		$custom .= "button, input[type=\"button\"], input[type=\"submit\"], input[type=\"reset\"],.btn {background-color:" . esc_attr($button_bg) . "; color:" . esc_attr($button_text) . "; border-color:" . esc_attr($button_border) . " }"."\n";

	// default button hover
		$button_hbg = get_theme_mod( 'button_hbg', '#303030' );
		$button_htext = get_theme_mod( 'button_htext', '#f3f3f3' );
		$button_hborder = get_theme_mod( 'button_hborder', '#303030' );
		$custom .= "button:hover, input[type=\"button\"]:hover, input[type=\"submit\"]:hover, input[type=\"reset\"]:hover,.btn:hover {background-color:" . esc_attr($button_hbg) . "; color:" . esc_attr($button_htext) . "; border-color:" . esc_attr($button_hborder) . " }"."\n";


	// read more button
		$readmore_icon_bg = get_theme_mod( 'readmore_icon_bg', '#fff' );
		$readmore_icon = get_theme_mod( 'readmore_icon', '#787878' );
		$readmore_border = get_theme_mod( 'readmore_border', '#cbcbcb' );
		$custom .= ".more-link, .more-link:visited {background-color:" . esc_attr($readmore_icon_bg) . "; border-color:" . esc_attr($readmore_border) . " }
		.more-link .read-more-icon {color:" . esc_attr($readmore_icon) . "; }"."\n";

	// read more button hover
		$readmore_icon_hbg = get_theme_mod( 'readmore_icon_hbg', '#beb27a' );
		$readmore_hicon = get_theme_mod( 'readmore_hicon', '#fff' );
		$readmore_hborder = get_theme_mod( 'readmore_hborder', '#beb27a' );
		$custom .= ".more-link:hover {background-color:" . esc_attr($readmore_icon_hbg) . "; border-color:" . esc_attr($readmore_hborder) . " }
		.more-link:hover .read-more-icon {color:" . esc_attr($readmore_hicon) . "; }"."\n";

	// mobile menu button
		$mobile_menu_button = get_theme_mod( 'mobile_menu_button', '#3f3f3f' );
		$mobile_menu_button_text = get_theme_mod( 'mobile_menu_button_text', '#fff' );
		$custom .= ".menu-toggle {background-color:" . esc_attr($mobile_menu_button) . "; color:" . esc_attr($mobile_menu_button_text) . "; }"."\n";

	// mobile menu button hover
		$mobile_menu_hbutton = get_theme_mod( 'mobile_menu_hbutton', '#535353' );
		$mobile_menu_button_htext = get_theme_mod( 'mobile_menu_button_htext', '#fff' );
		$custom .= ".menu-toggle:active,.menu-toggle:focus,.menu-toggle:hover {background-color:" . esc_attr($mobile_menu_hbutton) . "; color:" . esc_attr($mobile_menu_button_htext) . "; }"."\n";

	// mobile menu styles
		$mobile_menu_background = get_theme_mod( 'mobile_menu_background', '#000' );
		$mobile_menu_links = get_theme_mod( 'mobile_menu_links', '#fff' );
		$mobile_menu_borders = get_theme_mod( 'mobile_menu_borders', '#2a2a2a' );
		$custom .= ".main-navigation.toggled-on .nav-menu {background-color:" . esc_attr($mobile_menu_background) . "; }
		.main-navigation.toggled-on li a, .main-navigation.toggled-on li.home a { color:" . esc_attr($mobile_menu_links) . "}
		.main-navigation.toggled-on li { border-color:" . esc_attr($mobile_menu_borders) . "}"."\n";

	// mobile menu styles on hover
		$mobile_menu_hlinks = get_theme_mod( 'mobile_menu_hlinks', '#b8a138' );
		$custom .= ".main-navigation.toggled-on li.home a:hover,
		.main-navigation.toggled-on a:hover,
		.main-navigation.toggled-on .current-menu-item > a,	
		.main-navigation.toggled-on .current-menu-item > a,
		.main-navigatio.toggled-onn .current-menu-ancestor > a {color:" . esc_attr($mobile_menu_hlinks) . " }"."\n";
		
	// main menu styles
		$main_menu_links = get_theme_mod( 'main_menu_links', '#000' );
		$main_menu_submenu_bg = get_theme_mod( 'main_menu_submenu_bg', '#000' );
		$main_menu_submenu_links = get_theme_mod( 'main_menu_submenu_links', '#fff' );
		$custom .= ".main-navigation ul li a, .main-navigation ul li.home a {color:" . esc_attr($main_menu_links) . "; }
		.main-navigation ul li ul li { background-color:" . esc_attr($main_menu_submenu_bg) . ";}
		.main-navigation ul li ul li a { color:" . esc_attr($main_menu_submenu_links) . "}"."\n";
		
	// main menu styles on hover and active
		$main_menu_hover_active = get_theme_mod( 'main_menu_hover_active', '#b8a138' );
		$custom .= ".main-navigation li.home a:hover,
		.main-navigation a:hover,
		.main-navigation .current-menu-item > a,	
		.main-navigation .current-menu-item > a,
		.main-navigation .current-menu-ancestor > a {color:" . esc_attr($main_menu_hover_active) . "; }"."\n";
			
	// wp gallery captions
		$gallery_caption_bg = get_theme_mod( 'gallery_caption_bg', '#beb27a' );
		$gallery_caption_text = get_theme_mod( 'gallery_caption_text', '#fff' );
		$custom .= ".gallery .gallery-caption {background-color:" . esc_attr($gallery_caption_bg) . "; color:" . esc_attr($gallery_caption_text) . "; }"."\n";
		
	// image post hover
		$image_post_hover_bg = get_theme_mod( 'image_post_hover_bg', '#beb27a' );
		$image_post_hover_text = get_theme_mod( 'image_post_hover_text', '#fff' );
		$custom .= ".image-post .text-holder:hover {background-color:" . esc_attr($image_post_hover_bg) . ";}
		.format-image .featured,
		.image-post .entry-title a,
		.image-post .entry-meta, 
		.image-post .entry-meta a, 
		.image-post .entry-meta a:visited,
		.image-post .entry-meta span:after {color:" . esc_attr($image_post_hover_text) . "; }"."\n";
	
	// error page style
		$error_page_text = get_theme_mod( 'error_page_text', '#fff' );
		$error_page_button_bg = get_theme_mod( 'error_page_button_bg', '#beb27a' );
		$error_page_button_text = get_theme_mod( 'error_page_button_text', '#fff' );
		$custom .= "#error-overlay, #error-title {color:" . esc_attr($error_page_text) . "; }
		#error-button a, #error-button a:visited {background-color:" . esc_attr($error_page_button_bg) . "; color:" . esc_attr($error_page_button_text) . ";}"."\n";
	
	// error page style hover
		$error_page_button_hbg = get_theme_mod( 'error_page_button_hbg', '#fff' );
		$error_page_button_htext = get_theme_mod( 'error_page_button_htext', '#333' );
		$custom .= "#error-button a:hover {background-color:" . esc_attr($error_page_button_hbg) . "; color:" . esc_attr($error_page_button_htext) . ";}"."\n";

	// attachment page background
		$attachment_page_bg = get_theme_mod( 'attachment_page_bg', '#212121' );
		$custom .= ".attachment .featured-image-wrapper {background-color:" . esc_attr($attachment_page_bg) . ";}"."\n";
		
	// attachment page navigation
		$attachment_page_nav = get_theme_mod( 'attachment_page_nav', '#beb27a' );
		$custom .= "#image-navigation a,#image-navigation a:visited {color:" . esc_attr($attachment_page_nav) . ";}"."\n";
			
		
		

	//Output all the styles
	wp_add_inline_style( 'morphology-lite-style', $custom );	
}
add_action( 'wp_enqueue_scripts', 'morphology_lite_inline_styles' );	