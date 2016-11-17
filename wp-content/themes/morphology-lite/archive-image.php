<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Morphology Lite
 */
 
//$blogstyleclass = esc_attr(get_theme_mod( 'blog_style', 'blogstyle1' ));

get_header(); ?>

<div id="content" class="site-content">
	<div id="primary" class="content-area">
		<main id="main" class="site-main image-post clearfix" itemprop="mainContentOfPage">

		<?php if ( have_posts() ) : ?>

			
				<?php
				echo '<header class="page-header">';
					the_archive_title( '<h1 class="page-title screen-reader-text">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description screen-reader-text">', '</div>' );
				echo '</header>';	
				?>		
		
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php if ( has_post_format( 'image' )) { ?>
				
				<?php

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', 'image');
				?>
				
				<?php } ?>

			<?php endwhile; ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
		
	<?php if( esc_attr(get_theme_mod( 'show_blognav', 1 ) ) ) :
			morphology_lite_blog_pagination();	
	endif;?>
	
		<?php get_template_part( 'template-parts/footer-group' ); ?>
		
	</div><!-- #primary -->
	
</div><!-- #content -->

<?php get_footer(); ?>
