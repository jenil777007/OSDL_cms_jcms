<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Morphology Lite
 */

get_header(); ?>
	

<div id="content" class="site-content">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
   
		
<div class="content-width">

	  <div class="container-fluid">
			  <div class="row">
							<div class="col-sm-12" itemprop="mainContentOfPage">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'morphology-lite' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );
				?>

			<?php endwhile; ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

						</div>
			</div>
	</div>
	</div>
		</main><!-- #main -->

			

</div><!-- #primary -->

	<?php if( esc_attr(get_theme_mod( 'show_blognav', 1 ) ) ) :
			morphology_lite_blog_pagination();	
	endif;?>
	
		<?php get_template_part( 'template-parts/footer-group' ); ?>


</div><!-- .site-content -->	
	
	
	
<?php get_footer(); ?>
