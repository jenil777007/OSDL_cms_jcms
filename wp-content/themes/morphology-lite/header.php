<?php
/**
 * The header for our theme.
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package Morphology Lite
 */

 $logo_upload = get_option( 'logo_upload' );
 
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'morphology-lite' ); ?></a>

	<div id="sidebar" class="sidebar" <?php if ( get_header_image() ) : ?>style="background-image: url('<?php header_image(); ?>') <?php endif; ?>">
	
	
	
	
		<header id="masthead" class="site-header" role="banner">
			<div id="site-branding" class="clearfix">
				<div id="site-branding-inner">
                               
              		<div class="site-logo" itemscope itemtype="http://schema.org/Organization">
                    	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" itemprop="url">
                        	<?php morphology_lite_custom_logo(); ?>
                        </a>    
                    </div>                
                        
            
                 <?php  if( esc_attr(get_theme_mod( 'show_site_title', 1 ) ) ) :  ?>
                    
                        <div class="site-title" itemprop="headline"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></div>
                        
                 <?php endif; ?>
                    
                    <?php  if ( esc_attr(get_theme_mod( 'show_tagline', 1 ) ) ) : ?>
                        <?php  $description = get_bloginfo( 'description', 'display' );
							if ( $description || is_customize_preview() ) : ?>
							<div class="site-description" itemprop="description"><?php echo $description; ?></div>
						<?php endif; ?>
               		<?php endif;  ?>            
            
				

				</div>
			</div><!-- .site-branding -->
			
			<nav id="site-navigation" class="main-navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
                <div class="toggle-container">
                        <button class="menu-toggle"><?php esc_html_e( 'Menu', 'morphology-lite' ); ?></button>
                </div>
                              
				<?php
					wp_nav_menu( array(
						'theme_location' => 'primary',
						'menu_class'     => 'nav-menu',
						'fallback_cb'    => false,
					 ) );
				?>
					
            </nav><!-- #site-navigation -->
			
		</header><!-- .site-header -->	
	
	<?php  if ( esc_attr(get_theme_mod( 'show_columnfooter', 1 ) ) ) : ?>
		<footer class="column-footer hidden-lg-down">  
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
	<?php endif; ?> 

</div><!-- .sidebar -->
 