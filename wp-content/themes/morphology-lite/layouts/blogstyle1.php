<?php
/**
 * Blog style 1 - Top featured image with no sidebar
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
 
 ?>

    
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php // Check for featured image
    
    if ( has_post_thumbnail() ) {        
        echo '<div class="featured-image-wrapper"><a class="featured-image-link" href="' . esc_url( get_permalink() ) . '" aria-hidden="true">';
        the_post_thumbnail( 'post-thumbnail', array( 'alt' => get_the_title(), 'itemprop' => "image"));
        echo '</a></div>';
    }
    ?>
    <div class="entry-summary">
        <header class="entry-header">
        
        <?php 
        if( is_sticky() && is_home() ) :
			  $sticky = esc_html__( 'Featured', 'morphology-lite' );
			echo '<div class="sticky-wrapper"><span class="featured">' . $sticky . '</span></div>';
        endif; 
        ?>
        
        <?php  morphology_lite_entry_titles(); ?>
        
       
		<?php  if( esc_attr(get_theme_mod( 'show_summary_meta', 1 ) ) ) : 
		echo ' <div class="entry-meta">';
			 morphology_lite_posted_on(); 
		echo '</div>';
		 endif; ?>
	
        
        </header>
    
    <div class="entry-content" itemprop="text">
	
            <?php  // Option of content or excerpt
            $excerptcontent = esc_attr(get_theme_mod( 'excerpt_content', 'content' ));
			$moreicon = '<span class="fa fa-mail-forward read-more-icon"></span><span class="screen-reader-text">' . esc_html__('Read More', 'morphology-lite') . '</span>';
				 switch ($excerptcontent) {
					case "content" :
						the_content(  $moreicon  );
					break;
					case "excerpt" : 
						echo '<p>' . the_excerpt() . '</p>' ;
					break;
                }			
            // load our nav is our post is split into multiple pages
            morphology_lite_multipage_nav(); 						
            ?>
    
    </div><!-- .entry-content -->
    
    <footer class="entry-footer"></footer>
    
    </div>
    
</article><!-- #post-## -->