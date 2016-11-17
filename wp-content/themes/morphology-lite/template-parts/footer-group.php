<?php
/**
 * Template part for displaying the footer group.
 *
 * @package Morphology Lite
 */

?>

<div id="footer-wrapper">		
		<?php get_sidebar( 'footer' ); ?>
		
		<nav id="footer-nav">
            <?php wp_nav_menu( array( 
                    'theme_location' => 'footer', 
                    'fallback_cb' => false, 
                    'depth' => 1,
                    'container' => false, 
                    'menu_id' => 'footer-menu', 
                ) ); 
            ?>
        </nav>
		
    <footer class="page-footer hidden-xl-up">
   
            <?php if ( has_nav_menu( 'social' ) ) :
					echo '<nav class="social-menu">';
						wp_nav_menu( array(
							'theme_location' => 'social', 
							'depth' => 1, 
							'container' => false, 
							'menu_class' => 'social-icons', 
							'link_before' => '<span class="screen-reader-text">', 
							'link_after' => '</span>',
						) );
					echo '</nav>';
            endif; ?>

         <div class="site-info">
          <?php esc_html_e('Copyright &copy;', 'morphology-lite'); ?> 
          <?php echo date('Y'); ?> <?php echo esc_html(get_theme_mod( 'copyright', 'Your Name' )); ?>.<br><?php esc_html_e('All rights reserved.', 'morphology-lite'); ?>
        </div>
        
	</footer><!-- .site-footer -->		
		
		
</div>