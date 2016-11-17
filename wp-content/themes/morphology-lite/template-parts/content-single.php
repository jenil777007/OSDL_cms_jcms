<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Morphology Lite
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php if( esc_attr(get_theme_mod( 'show_single_thumbnail', 1 ) ) ) :  
		echo '<div class="featured-image-wrapper">';         
					the_post_thumbnail( 'post-thumbnail', array( 'alt' => get_the_title(), 'itemprop' => "image"));
		echo '</div>';
         endif; ?>
		 
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' ); ?>

		
		<?php if( esc_attr(get_theme_mod( 'show_single_meta_info', 1 ) ) ) :
			echo '<div class="entry-meta">';
				morphology_lite_posted_on(); 
			echo '</div>';
		endif; ?>
	</header>

	<div class="entry-content" itemprop="text">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'morphology-lite' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer" itemscope itemtype="http://schema.org/WPFooter">
		
		<?php 
		// get the post footer info
		morphology_lite_entry_footer(); 

		// show the author bio
		if( esc_attr(get_theme_mod( 'show_authorbio', 1 ) ) ) {
			if ( is_single() && get_the_author_meta( 'description' ) ) :
				get_template_part( 'author-bio' );
			endif;
		}
		
		// get the post next and previous post navigation
		if( esc_attr(get_theme_mod( 'show_postnav', 1 ) ) ) :			
			morphology_lite_post_pagination();	
		endif;
		?>

	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
