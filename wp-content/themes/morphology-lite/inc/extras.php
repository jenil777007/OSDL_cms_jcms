<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Morphology Lite
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function morphology_lite_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'morphology_lite_body_classes' );


/**
 * Move the More Link outside from the contents last summary paragraph tag.
 */
if ( ! function_exists( 'morphology_lite_move_more_link' ) ) :
	function morphology_lite_move_more_link($link) {
			$link = '<p class="more-link-wrapper">'.$link.'</p>';
			return $link;
		}
	add_filter('the_content_more_link', 'morphology_lite_move_more_link');
endif;

/**
 * Prevent page scroll after clicking read more to load the full post.
 */
if ( ! function_exists( 'morphology_lite_remove_more_link_scroll' ) ) : 
	function morphology_lite_remove_more_link_scroll( $link ) {
		$link = preg_replace( '|#more-[0-9]+|', '', $link );
		return $link;
		}
	add_filter( 'the_content_more_link', 'morphology_lite_remove_more_link_scroll' );
endif;


/**
 * Filter the "read more" excerpt string link to the post.
 * Use an icon for the "read more"
 */
function morphology_lite_excerpt_more( $more ) {
	$moreicon = '<span class="fa fa-mail-forward read-more-icon"></span><span class="screen-reader-text">' . esc_html__('Read More', 'morphology-lite') . '</span>';
    return sprintf( '&hellip;<p class="more-link-wrapper"><a class="more-link" href="%1$s">%2$s</a></p>',
        get_permalink( get_the_ID() ),
        $moreicon
    );
}
add_filter( 'excerpt_more', 'morphology_lite_excerpt_more' );

/**
 * Filter the except length to the users option setting.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function morphology_lite_custom_excerpt_length( $length ) {
	$excerptlength = esc_attr(get_theme_mod( 'excerpt_limit', '50' ));
    return $excerptlength;
}
add_filter( 'excerpt_length', 'morphology_lite_custom_excerpt_length', 999 );
	
/**
 * Custom comments style
 * @package Morphology Lite
 */

if (!function_exists('morphology_lite_comment')) {
function morphology_lite_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>

<li>                        
	<div class="comment-wrapper">
		
			<div class="comment-info">
				<?php echo get_avatar($comment, 50); ?>
				<span class="comment_date">
                
				<cite class="fn"><?php echo get_comment_author_link(); ?></cite>
                        		
					<p><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ) ?>"><?php echo get_comment_date() . ' at ' . get_comment_time() ?></a>	
					<?php edit_comment_link( esc_html__( 'Edit Comment', 'morphology-lite' ), '', '' ); ?>	
					<?php comment_reply_link( array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']) ) ); ?>		</p>
			</div>
        
			<div id="comment-<?php echo comment_ID(); ?>" class="comment">
				<?php comment_text(); ?>
			</div>
		</div>
	                         
                
<?php if ($comment->comment_approved == '0') : ?>
<p><em><?php esc_html_e('Your comment is awaiting moderation.', 'morphology-lite'); ?></em></p>
<?php endif; ?>
<?php 
}
}	
		

/**
 * get out of that loop
 * Special thanks to the Resi theme for this method
 */
function morphology_lite_exclude_post_formats_from_blog( $query ) {

	if( $query->is_main_query() && $query->is_home() ) {
		$tax_query = array( array(
			'taxonomy' => 'post_format',
			'field' => 'slug',
			'terms' => array( 'post-format-image' ),
			'operator' => 'NOT IN',
		) );
		$query->set( 'tax_query', $tax_query );
	}

}
add_action( 'pre_get_posts', 'morphology_lite_exclude_post_formats_from_blog' ); 


/**
 * Use the archive image template for image posts
 */
function morphology_lite_gallery_template_chooser( $template ) {
	 
	    // Check if the taxonomy query contains only image formats
	    if ( is_category() || is_tag() ) {
	        $gallery_view = true;
	        global $wp_query;
	        if ( $wp_query->have_posts() ) :
	            while ( $wp_query->have_posts() ) : $wp_query->the_post();
	                $format = get_post_format();
	                if ( ( $format != 'image' ) ) {
	                     $gallery_view = false;
	                }
	            endwhile;
	        endif;
	        if ( $gallery_view ) {
	            // gallery template
	            $template = get_query_template( 'archive-image' );  
	        }
	    }
	 
	    return $template;
	}
add_filter( 'template_include', 'morphology_lite_gallery_template_chooser' );
 	
	
	