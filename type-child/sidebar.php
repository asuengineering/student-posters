<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-template-parts
 *
 * @package Type
 * @since Type 1.0
 */

?>

<aside id="secondary" class="sidebar widget-area" >
	<?php if( type_is_woocommerce_active() && is_woocommerce() ) : ?>

		<?php if ( is_active_sidebar( 'sidebar-shop' ) ) { dynamic_sidebar( 'sidebar-shop' ); } ?>

	<?php else : ?>

    <div class="search">
      <?php if ( is_active_sidebar( 'sidebar-search' ) ) { dynamic_sidebar( 'sidebar-search' ); } ?>
    </div>

    <div class="left-half" >
		<?php if ( is_active_sidebar( 'sidebar-1' ) ) { dynamic_sidebar( 'sidebar-1' ); } ?>
  </div>

    <div class="right-half" role="complementary">
      <?php if (is_active_sidebar( 'sidebar-yasmine')) { dynamic_sidebar( 'sidebar-yasmine'); } ?>
       <!-- <?php echo do_shortcode('[searchandfilter fields="publication" headings="2017-2022"]'); ?> -->
    </div>

	<?php endif; ?>
</aside><!-- #secondary -->
