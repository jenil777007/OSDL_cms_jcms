<?php
/**
 * The template for displaying archive pages.
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

			<?php
				$blog_style = esc_attr(get_theme_mod( 'blog_style', 'blogstyle1' ));                            
				switch ($blog_style) {

					// top featured image no sidebars
					case "blogstyle1" : 
							if ( have_posts() ) :  if ( is_archive() ) : 
								if( esc_attr(get_theme_mod( 'show_archive_header', 0 ) ) ) :
								echo '<header class="page-header">';	
									if( esc_attr(get_theme_mod( 'show_archive_title', 1 ) ) ) :								
										morphology_lite_archive_title( '<h1 class="page-title" itemprop="headline">', '</h1>' );
									endif;
									if( esc_attr(get_theme_mod( 'show_category_desc', 1 ) ) ) :									
										morphology_lite_archive_description( '<div class="category-description">', '</div>' );
									endif;									
								echo '</header>';
								endif;
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
							if ( have_posts() ) :  if ( is_archive() ) : 
								if( esc_attr(get_theme_mod( 'show_archive_header', 0 ) ) ) :
								echo '<header class="page-header">';	
									if( esc_attr(get_theme_mod( 'show_archive_title', 1 ) ) ) :								
										morphology_lite_archive_title( '<h1 class="page-title" itemprop="headline">', '</h1>' );
									endif;
									if( esc_attr(get_theme_mod( 'show_category_desc', 1 ) ) ) :									
										morphology_lite_archive_description( '<div class="category-description">', '</div>' );
									endif;									
								echo '</header>';
								endif;
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
							if ( have_posts() ) :  if ( is_archive() ) : 
								if( esc_attr(get_theme_mod( 'show_archive_header', 0 ) ) ) :
								echo '<header class="page-header">';	
									if( esc_attr(get_theme_mod( 'show_archive_title', 1 ) ) ) :								
										morphology_lite_archive_title( '<h1 class="page-title" itemprop="headline">', '</h1>' );
									endif;
									if( esc_attr(get_theme_mod( 'show_category_desc', 1 ) ) ) :									
										morphology_lite_archive_description( '<div class="category-description">', '</div>' );
									endif;									
								echo '</header>';
								endif;
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
							if ( have_posts() ) :  if ( is_archive() ) : 
								if( esc_attr(get_theme_mod( 'show_archive_header', 0 ) ) ) :
								echo '<header class="page-header">';	
									if( esc_attr(get_theme_mod( 'show_archive_title', 1 ) ) ) :								
										morphology_lite_archive_title( '<h1 class="page-title" itemprop="headline">', '</h1>' );
									endif;
									if( esc_attr(get_theme_mod( 'show_category_desc', 1 ) ) ) :									
										morphology_lite_archive_description( '<div class="category-description">', '</div>' );
									endif;									
								echo '</header>';
								endif;
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
							if ( have_posts() ) :  if ( is_archive() ) : 
								if( esc_attr(get_theme_mod( 'show_archive_header', 0 ) ) ) :
								echo '<header class="page-header">';	
									if( esc_attr(get_theme_mod( 'show_archive_title', 1 ) ) ) :								
										morphology_lite_archive_title( '<h1 class="page-title" itemprop="headline">', '</h1>' );
									endif;
									if( esc_attr(get_theme_mod( 'show_category_desc', 1 ) ) ) :									
										morphology_lite_archive_description( '<div class="category-description">', '</div>' );
									endif;									
								echo '</header>';
								endif;
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
							if ( have_posts() ) :  if ( is_archive() ) : 
								if( esc_attr(get_theme_mod( 'show_archive_header', 0 ) ) ) :
								echo '<header class="page-header">';	
									if( esc_attr(get_theme_mod( 'show_archive_title', 1 ) ) ) :								
										morphology_lite_archive_title( '<h1 class="page-title" itemprop="headline">', '</h1>' );
									endif;
									if( esc_attr(get_theme_mod( 'show_category_desc', 1 ) ) ) :									
										morphology_lite_archive_description( '<div class="category-description">', '</div>' );
									endif;									
								echo '</header>';
								endif;
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
	
		<?php get_template_part( 'template-parts/footer-group' ); ?>
	
	</div><!-- #primary -->
	</div>
	
<?php get_footer(); ?>
