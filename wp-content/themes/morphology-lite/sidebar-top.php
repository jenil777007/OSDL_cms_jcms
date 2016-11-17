<?php

/**
 * Top sidebar group  
 *
 * @package Morphology Lite
 */


if (   ! is_active_sidebar( 'top1'  )
	&& ! is_active_sidebar( 'top2' )
	&& ! is_active_sidebar( 'top3'  )
	&& ! is_active_sidebar( 'top4'  )		
		
	)

		return;
	// If we get this far, we have widgets. Let do this.
?>

<div id="top-wrapper">
  <div class="container-fluid">
  <div class="row">
    
    <aside class="widget-area clearfix" role="complementary">			
      
      <?php if ( is_active_sidebar( 'top1' ) ) : ?>
      <div id="top1" <?php morphology_lite_top(); ?>>
        <?php dynamic_sidebar( 'top1' ); ?>
        </div><!-- #top1 -->
      <?php endif; ?>
      
      <?php if ( is_active_sidebar( 'top2' ) ) : ?>           
      <div id="top2" <?php morphology_lite_top(); ?>>
        <?php dynamic_sidebar( 'top2' ); ?>
        </div><!-- #top2 -->          
      <?php endif; ?>
      
      <?php if ( is_active_sidebar( 'top3' ) ) : ?>            
      <div id="top3" <?php morphology_lite_top(); ?>>
        <?php dynamic_sidebar( 'top3' ); ?>
        </div><!-- #top3 -->
      <?php endif; ?>
      
      <?php if ( is_active_sidebar( 'top4' ) ) : ?>        
      <div id="top4" <?php morphology_lite_top(); ?>>
        <?php dynamic_sidebar( 'top4' ); ?>
        </div><!-- #top4 -->
      <?php endif; ?>
      
      </aside>
    
  </div>
  </div>
</div>