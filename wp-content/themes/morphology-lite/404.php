<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Morphology Lite
 */

get_header(); ?>

<div id="content" class="site-content">
			<section class="error-404 not-found">
               
                <div id="error-overlay">
                
				<header class="page-header">
					<h1 id="error-title"><?php esc_html_e( '404', 'morphology-lite' ); ?></h1>
				</header>                
                <p id="error-message"><?php esc_html_e( 'Unfortunately, it looks as though the page you were wanting to visit is missing', 'morphology-lite' ); ?></p>
                <p id="error-button"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_html_e( 'Home', 'morphology-lite' ); ?></a></p>
                </div>

			</section><!-- .error-404 -->

</div><!-- .site-content -->

</div><!-- .site -->
<?php wp_footer(); ?>    
</body>
</html>