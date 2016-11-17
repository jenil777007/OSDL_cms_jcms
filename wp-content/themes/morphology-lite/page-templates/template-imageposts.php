<?php
/**
Template Name: Image Posts
 *
 * @package morphology
 */

get_header(); ?>


<div id="content" class="site-content">
	<div id="primary" class="content-area">
		<main id="main" class="site-main image-post clearfix" itemprop="mainContentOfPage">
        
        <?php // loop details
        
        $post_count = esc_attr( get_theme_mod( 'post_count', '12' ) );	
	
		$args = array( 
			'post_type' => 'post',
			'order' => 'DESC', 
			'orderby' => 'date',
			'posts_per_page' => $post_count, 
			'tax_query' => 				
				array(
					array(
      				'taxonomy' => 'post_format',
      				'field' => 'slug',
      				'terms' => 'post-format-image', 
    	)));
	
		// the query
		$morphology_lite_the_query = new WP_Query( $args );


$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
$query = new WP_Query( array( 'paged' => $paged ) );

		
			if ( $morphology_lite_the_query->have_posts() ) :
	
				while ( $morphology_lite_the_query->have_posts() ) : $morphology_lite_the_query->the_post(); ?> 
		
        				<?php if ( has_post_format( 'image' ) ) { ?> 
                        
<?php

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', 'image');
				?>
                        
                        <?php } ?> 
  
					<?php endwhile; 
	
				endif; 

			// Reset Post Data
			wp_reset_postdata(); ?>
	
    
		</main><!-- #main -->
		
		<?php get_template_part( 'template-parts/footer-group' ); ?>

	</div><!-- #primary -->
</div><!-- #content -->

<?php get_footer(); ?>
