<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Morphology Lite
 */

$blog_style = esc_attr(get_theme_mod( 'blog_style', 'blogstyle1' ));

get_header(); ?>



<div id="content" class="site-content">
	<div id="primary" class="content-area">
		<main id="main" class="site-main <?php echo $blog_style ?> clearfix" itemprop="mainContentOfPage">

<?php get_sidebar( 'banner' ); ?>

<?php get_sidebar( 'top' ); ?>

			<?php                        
				switch ($blog_style) {

					// top featured image no sidebars
					case "blogstyle1" : 
							if ( have_posts() ) :  if ( is_home() && ! is_front_page() ) : 
								echo '<header><h1 class="page-title screen-reader-text">';
									single_post_title(); 
								echo '</h1></header>';
							 endif; 
							while ( have_posts() ) : the_post(); 
								get_template_part( 'layouts/blogstyle1' );
							endwhile; 

							else : 
								get_template_part( 'template-parts/content', 'none' ); 
							endif;				
					break;				

					 // top featured image centered with left aligned summary
					case "blogstyle2" : 
							if ( have_posts() ) :  if ( is_home() && ! is_front_page() ) : 
								echo '<header><h1 class="page-title screen-reader-text">';
									single_post_title(); 
								echo '</h1></header>';
							 endif; 
							while ( have_posts() ) : the_post(); 
								get_template_part( 'layouts/blogstyle2' );
							endwhile; 

							else : 
								get_template_part( 'template-parts/content', 'none' ); 
							endif;				
					break;

					 // top featured image centered with centered summary
					case "blogstyle3" : 
							if ( have_posts() ) :  if ( is_home() && ! is_front_page() ) : 
								echo '<header><h1 class="page-title screen-reader-text">';
									single_post_title(); 
								echo '</h1></header>';
							 endif; 
							while ( have_posts() ) : the_post(); 
								get_template_part( 'layouts/blogstyle2' );
							endwhile; 

							else : 
								get_template_part( 'template-parts/content', 'none' ); 
							endif;				
					break;
					
					 // top featured image with a right sidebar
					case "blogstyle4" : 
						 echo '<div class="container"><div class="row">';
							if ( have_posts() ) :  if ( is_home() && ! is_front_page() ) : 
								echo '<header><h1 class="page-title screen-reader-text">';
									single_post_title(); 
								echo '</h1></header>';
							 endif; 
							 echo '<div class="col-md-8" itemprop="mainContentOfPage">';
							while ( have_posts() ) : the_post(); 
								get_template_part( 'layouts/blogstyle4' );
							endwhile; 

							else : 
								get_template_part( 'template-parts/content', 'none' ); 
							endif; 
							echo '</div><div class="col-md-4">';
							get_sidebar( 'right' );
							echo '</div></div></div>';					
					break;

					 // left featured image no sidebars
					case "blogstyle5" : 
						 echo '<div itemprop="mainContentOfPage">';
							if ( have_posts() ) :  if ( is_home() && ! is_front_page() ) : 
								echo '<header><h1 class="page-title screen-reader-text">';
									single_post_title(); 
								echo '</h1></header>';
							 endif; 
							while ( have_posts() ) : the_post(); 
								get_template_part( 'layouts/blogstyle5' );
							endwhile; 

							else : 
								get_template_part( 'template-parts/content', 'none' ); 
							endif; 
							echo '</div>';					
					break;

					 // Masonry layout
					case "blogstyle6" : 
							if ( have_posts() ) :  if ( is_home() && ! is_front_page() ) : 
								echo '<header><h1 class="page-title screen-reader-text">';
									single_post_title(); 
								echo '</h1></header>';
							 endif; 
							 echo '<div id="morphology-masonry" class="" itemprop="mainContentOfPage"><div class="grid-sizer"></div>';
							while ( have_posts() ) : the_post(); 
								get_template_part( 'layouts/blogstyle6' );
							endwhile; 
								 
							else : 
								get_template_part( 'template-parts/content', 'none' ); 
							endif; 
							echo '</div>';	
							
					break;									
			   
				}            
			?> 

		</main><!-- #main -->
		
	<?php if( esc_attr(get_theme_mod( 'show_blognav', 1 ) ) ) :
			morphology_lite_blog_pagination();	
	endif;?>
						
<?php get_sidebar( 'bottom' ); ?>						
		<?php get_template_part( 'template-parts/footer-group' ); ?>
		
	</div><!-- #primary -->
	

							
</div><!-- #content -->

<?php get_footer(); ?>
