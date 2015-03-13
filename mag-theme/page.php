<?php 
	if(is_page('checkout') || is_page('cart') || is_page('terms') || is_page('my-account')) {
		get_header('shop');
	} else {
		get_header();
	}
?>

<div id="main-content" class="main-content">

<?php
	if ( is_front_page() && twentyfourteen_has_featured_posts() ) {
		// Include the featured content template.
		get_template_part( 'featured-content' );
	}
?>	
	<div class="wrap">
		<?php
			// Start the Loop.
			while ( have_posts() ) : the_post();

				// Include the page content template.
				get_template_part( 'content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}
			endwhile;
		?>
	</div> <!-- wrap -->

</div><!-- #main-content -->

<?php get_footer(); ?>
