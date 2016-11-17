<?php
/**
 * Template part for displaying the image post format.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Morphology Lite
 */
 
 ?>

    
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


<div class="featured-image-wrapper">
       			
	<?php the_post_thumbnail( 'tiled-thumbnails', array( 'alt' => get_the_title(), 'itemprop' => "image"));	?>

	<div class="dark-overlay"></div>
	<a class="featured-image-link" href="<?php echo esc_url( get_permalink() ); ?>" aria-hidden="true">
	<div class="text-holder">
		<div class="text-holder2">
			<div class="text-holder3">
			        <?php 
        if( is_sticky() ) :
			  $sticky = esc_html__( 'Featured', 'morphology-lite' );
			echo '<div class="sticky-wrapper"><span class="featured">' . $sticky . '</span></div>';
        endif; 
        ?>
				<?php  morphology_lite_entry_titles(); ?>      
				<div class="entry-meta">
				<?php  if( esc_attr(get_theme_mod( 'show_summary_meta', 1 ) ) ) :  ?>
					<?php morphology_lite_tiled_posted_on(); ?>
				<?php endif; ?>
				</div>
			</div>
		</div>
	</div>		
	</a>
</div>

    
</article>