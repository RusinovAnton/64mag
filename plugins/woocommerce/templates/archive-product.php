<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<?php define( 'WP_DEBUG', true );?>


<?php get_header( 'shop' ); ?>
<div class="wrap">
	<?php wc_get_template( 'category-navigation.php' ); ?>
<div id="slider-shop" class="loading">
	<?php echo do_shortcode('[huge_it_slider id="2"]'); ?>
</div>
<?php get_sidebar('shop'); ?>

</div>
<!-- end wrap -->

<?php get_footer( 'shop' ); ?>