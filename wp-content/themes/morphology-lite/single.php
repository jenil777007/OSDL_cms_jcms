<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Morphology Lite
 */

$single_style = esc_attr(get_theme_mod( 'single_style', 'singlestyle1' ));

get_header(); ?>

<div id="content" class="site-content">
	<div id="primary" class="content-area">
		<main id="main" class="site-main <?php echo $single_style ?> clearfix" itemprop="mainContentOfPage">

		
					<?php                     
						switch ($single_style) {

							// Single with a right sidebar column
							case "singlestyle1" : 
								echo '<div class="container"><div class="row"><div class="col-md-8">';   
								while ( have_posts() ) : the_post();
									get_template_part( 'template-parts/content', 'single' );
									
										if ( comments_open() || get_comments_number() ) {
										comments_template();
										}
									endwhile;
								echo '</div><div class="col-md-4">';
									get_sidebar( 'right' );
								echo '</div></div></div>';					
							break;

							// Single with fluid width and a right sidebar column
							case "singlestyle2" : 
								echo '<div class="container-fluid"><div class="row"><div class="col-md-8">';   
								while ( have_posts() ) : the_post();
									get_template_part( 'template-parts/content', 'single' );
										if ( comments_open() || get_comments_number() ) {
										comments_template();
										}
									endwhile;
								echo '</div><div class="col-md-4">';
									get_sidebar( 'right' );
								echo '</div></div></div>';					
							break;
							
							// Single without a left or right sidebar
							case "singlestyle3" : 
								echo '<div class="container"><div class="row"><div class="col-md-12">'; 
								while ( have_posts() ) : the_post();
									get_template_part( 'template-parts/content', 'single' );
										if ( comments_open() || get_comments_number() ) {
										comments_template();
										}
									endwhile;						
								echo '</div></div></div>';
							break;
							
							// fluid full width Single without a left or right sidebar
							case "singlestyle4" : 
								echo '<div class="container-fluid"><div class="row"><div class="col-md-12">'; 
								while ( have_posts() ) : the_post();
									get_template_part( 'template-parts/content', 'single' );
										if ( comments_open() || get_comments_number() ) {
										comments_template();
										}
									endwhile;						
								echo '</div></div></div>';
							break;							
							
						}	
					?>

		</main><!-- #main -->
		
		<?php get_template_part( 'template-parts/footer-group' ); ?>

	</div><!-- #primary -->

</div><!-- #content -->


<?php get_footer(); ?>
