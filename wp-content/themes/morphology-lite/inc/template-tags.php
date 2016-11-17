<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Morphology Lite
 */

 
if ( ! function_exists( 'morphology_lite_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 * Does nothing if the custom logo is not available.
 */
function morphology_lite_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;


 /**
  * Prints HTML for post header
  */
if ( ! function_exists( 'morphology_lite_entry_titles' ) ) :
function morphology_lite_entry_titles() { 
    
if ( is_single() ) :
	
        echo '<h1 class="entry-title" itemprop="headline">';		
		if(the_title( '', '', false ) !='') the_title(); 
			else _e('Untitled', 'morphology-lite'); 
	echo '</h1>';
	  
 else :
		
	echo '<h2 class="entry-title" itemprop="headline"><a href="' .esc_url( get_permalink() ) .'" rel="bookmark">';			
	if(the_title( '', '', false ) !='') the_title(); 
		else _e('Untitled', 'morphology-lite'); 
	echo '</a></h2>';
	  
    endif;
}

endif;


/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
if ( ! function_exists( 'morphology_lite_posted_on' ) ) :

function morphology_lite_posted_on() {
	
if ( esc_attr(get_theme_mod( 'show_post_format', 1 )) ) :	
	$format = get_post_format();	
	if ( current_theme_supports( 'post-formats', $format ) ) {
		printf( '<span class="entry-format">%1$s<a href="%2$s">%3$s</a></span>',
			sprintf( '<span class="screen-reader-text">%s </span>', _x( 'Format', 'Used before post format.', 'morphology-lite' ) ),
			esc_url( get_post_format_link( $format ) ),
			get_post_format_string( $format )
		);
	}
endif;
	
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s"></time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
	
		_x( 'Posted on %s', 'post date', 'morphology-lite' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		_x( 'by %s', 'post author', 'morphology-lite' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);
	if ( esc_attr(get_theme_mod( 'show_postdate', 1 )) ) :
		echo '<span class="posted-on">' . $posted_on . '</span>';
	endif;
	
	if ( esc_attr(get_theme_mod( 'show_postauthor', 1 )) ) :
		echo '<span class="byline">' . $byline . '</span>';
	endif;
	
	if ( esc_attr(get_theme_mod( 'show_commentslink', 1 )) ) :
		if ( ! is_singular() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link( sprintf( __( 'Leave a comment<span class="screen-reader-text"> on %s</span>', 'morphology-lite' ), get_the_title() ) );
			echo '</span>';
		}
	endif;

}
endif;

/**
 * Prints HTML with meta information for the current post-date/time when using the
 * Tiled Blog Layout style.
 */
if ( ! function_exists( 'morphology_lite_tiled_posted_on' ) ) :

function morphology_lite_tiled_posted_on() {
	
if ( esc_attr(get_theme_mod( 'show_post_format', 1 )) ) :	
	$format = get_post_format();	
	if ( current_theme_supports( 'post-formats', $format ) ) {
		printf( '<span class="entry-format">%1$s<a href="%2$s">%3$s</a></span>',
			sprintf( '<span class="screen-reader-text">%s </span>', _x( 'Format', 'Used before post format.', 'morphology-lite' ) ),
			esc_url( get_post_format_link( $format ) ),
			get_post_format_string( $format )
		);
	}
endif;
	
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s"></time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
	
		_x( 'Posted on %s', 'post date', 'morphology-lite' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	if ( esc_attr(get_theme_mod( 'show_postdate', 1 )) ) :
		echo '<span class="posted-on">' . $posted_on . '</span>';
	endif;
	
	if ( esc_attr(get_theme_mod( 'show_commentslink', 1 )) ) :
		if ( ! is_singular() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link( sprintf( __( 'Leave a comment<span class="screen-reader-text"> on %s</span>', 'morphology-lite' ), get_the_title() ) );
			echo '</span>';
		}
	endif;

}
endif;



/**
 * Prints HTML with meta information for the categories, tags and comments.
 */


if ( ! function_exists( 'morphology_lite_entry_footer' ) ) :
function morphology_lite_entry_footer() {
	$categories_list = get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'morphology-lite' ) );
	if ( esc_attr(get_theme_mod( 'show_categories', 1 )) ) :
	if ( $categories_list && morphology_lite_categorized_blog() ) {
		printf( '<div class="cat-links">%1$s %2$s</div>',
			_x( 'Categories', 'Used before category names.', 'morphology-lite' ),
			$categories_list
		);
	}
endif;

	$tags_list = get_the_tag_list( '', _x( ', ', 'Used between list items, there is a space after the comma.', 'morphology-lite' ) );
	if ( esc_attr(get_theme_mod( 'show_tags', 1 )) ) :
	if ( $tags_list ) {
		printf( '<div class="tags-links">%1$s %2$s</div>',
			_x( 'Tags', 'Used before tag names.', 'morphology-lite' ),
			$tags_list
		);
	}
	endif;
	
	if ( esc_attr(get_theme_mod( 'show_edit', 0 )) ) :
	 //edit_post_link( esc_html__( 'Edit this post', 'twentyfifteen' );
	 edit_post_link(
			sprintf(
				/* translators: %s: Name of current post */
				__( 'Edit this post <span class="screen-reader-text"> "%s"</span>', 'morphology-lite' ),
				get_the_title()
			),
			'<div class="edit-link">',
			'</div>'
		);
		endif;
}
endif;


/**
 * Multi-page navigation.
 */
if ( ! function_exists( 'morphology_lite_multipage_nav' ) ) :
function morphology_lite_multipage_nav() {
	wp_link_pages( array(
		'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'morphology-lite' ) . '</span>',
		'after'       => '</div>',
		'link_before' => '<span>',
		'link_after'  => '</span>',
		'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'morphology-lite' ) . ' </span>%',
		'separator'   => ', ',
	) );
}
endif;

/**
 * Blog pagination when more than one page of post summaries.
 * Add classes to next_posts_link and previous_posts_link
 */
add_filter('next_posts_link_attributes', 'morphology_lite_posts_link_attributes_1');
add_filter('previous_posts_link_attributes', 'morphology_lite_posts_link_attributes_2');

function morphology_lite_posts_link_attributes_1() {
    return 'class="post-nav-older"';
}
function morphology_lite_posts_link_attributes_2() {
    return 'class="post-nav-newer"';
}

// Output the pagination navigation
if ( ! function_exists( 'morphology_lite_blog_pagination' ) ) :
function morphology_lite_blog_pagination() {	
		echo '<div class="pagination clearfix">';
		echo get_next_posts_link( __('Older Posts', 'morphology-lite'));		
		echo get_previous_posts_link( __('Newer Posts', 'morphology-lite'));
		echo '</div>';	
}
endif;


/**
 * Single Post previous or next navigation.
 */
if ( ! function_exists( 'morphology_lite_post_pagination' ) ) :
function morphology_lite_post_pagination() {
	the_post_navigation( array(	
		'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next Post', 'morphology-lite' ) . '</span> ' .
			'<span class="screen-reader-text">' . __( 'Next Post:', 'morphology-lite' ) . '</span> ' .
			'<span class="post-title">%title</span>',
			
		'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous Post', 'morphology-lite' ) . '</span> ' .
			'<span class="screen-reader-text">' . __( 'Previous Post:', 'morphology-lite' ) . '</span> ' .
			'<span class="post-title">%title</span>',
	) );
}
endif;










/**
 * Shim for `the_archive_title()`.
 *
 * Display the archive title based on the queried object.
 * Custom filter for changing the default archive title labels.
 *
 * @param string $before Optional. Content to prepend to the title. Default empty.
 * @param string $after  Optional. Content to append to the title. Default empty.
 */
 
if ( ! function_exists( 'morphology_lite_archive_title' ) ) :

function morphology_lite_archive_title( $before = '', $after = '' ) {
	if ( is_category() ) {
		$title = sprintf( ( '%s' ), single_cat_title( '', false ) );
	} elseif ( is_tag() ) {
		$title = sprintf( esc_html__( 'Posts Tagged with %s', 'morphology-lite' ), single_tag_title( '', false ) );
	} elseif ( is_author() ) {
		$title = sprintf( esc_html__( 'Posts by %s', 'morphology-lite' ), '<span class="vcard">' . get_the_author() . '</span>' );
	} elseif ( is_year() ) {
		$title = sprintf( esc_html__( 'Posts from: %s', 'morphology-lite' ), get_the_date( esc_html_x( 'Y', 'yearly archives date format', 'morphology-lite' ) ) );
	} elseif ( is_month() ) {
		$title = sprintf( esc_html__( 'Posts from %s', 'morphology-lite' ), get_the_date( esc_html_x( 'F Y', 'monthly archives date format', 'morphology-lite' ) ) );
	} elseif ( is_day() ) {
		$title = sprintf( esc_html__( 'Posts from %s', 'morphology-lite' ), get_the_date( esc_html_x( 'F j, Y', 'daily archives date format', 'morphology-lite' ) ) );
	} elseif ( is_tax( 'post_format' ) ) {
		if ( is_tax( 'post_format', 'post-format-aside' ) ) {
			$title = esc_html_x( 'Asides', 'post format archive title', 'morphology-lite' );
		} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
			$title = esc_html_x( 'Galleries', 'post format archive title', 'morphology-lite' );
		} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
			$title = esc_html_x( 'Images', 'post format archive title', 'morphology-lite' );
		} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
			$title = esc_html_x( 'Videos', 'post format archive title', 'morphology-lite' );
		} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
			$title = esc_html_x( 'Quotes', 'post format archive title', 'morphology-lite' );
		} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
			$title = esc_html_x( 'Links', 'post format archive title', 'morphology-lite' );
		} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
			$title = esc_html_x( 'Statuses', 'post format archive title', 'morphology-lite' );
		} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
			$title = esc_html_x( 'Audio', 'post format archive title', 'morphology-lite' );
		} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
			$title = esc_html_x( 'Chats', 'post format archive title', 'morphology-lite' );
		}
	} elseif ( is_post_type_archive() ) {
		$title = sprintf( esc_html__( 'Archives: %s', 'morphology-lite' ), post_type_archive_title( '', false ) );
	} elseif ( is_tax() ) {
		$tax = get_taxonomy( get_queried_object()->taxonomy );
		/* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
		$title = sprintf( esc_html__( '%1$s: %2$s', 'morphology-lite' ), $tax->labels->singular_name, single_term_title( '', false ) );
	} else {
		$title = esc_html__( 'Archives', 'morphology-lite' );
	}

	/**
	 * Filter the archive title.
	 *
	 * @param string $title Archive title to be displayed.
	 */
	$title = apply_filters( 'get_the_archive_title', $title );

	if ( ! empty( $title ) ) {
		echo $before . $title . $after;  // WPCS: XSS OK.
	}
}
endif;

if ( ! function_exists( 'morphology_lite_archive_description' ) ) :
/**
 * Shim for `the_archive_description()`.
 *
 * Display category, tag, or term description.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 *
 * @param string $before Optional. Content to prepend to the description. Default empty.
 * @param string $after  Optional. Content to append to the description. Default empty.
 */
function morphology_lite_archive_description( $before = '', $after = '' ) {
	$description = apply_filters( 'get_the_archive_description', term_description() );

	if ( ! empty( $description ) ) {
		/**
		 * Filter the archive description.
		 *
		 * @see term_description()
		 *
		 * @param string $description Archive description to be displayed.
		 */
		echo $before . $description . $after;  // WPCS: XSS OK.
	}
}
endif;























/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function morphology_lite_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'morphology_lite_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'morphology_lite_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so morphology_lite_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so morphology_lite_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in morphology_lite_categorized_blog.
 */
function morphology_lite_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'morphology_lite_categories' );
}
add_action( 'edit_category', 'morphology_lite_category_transient_flusher' );
add_action( 'save_post',     'morphology_lite_category_transient_flusher' );
