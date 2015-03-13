<?php get_header(); ?>
<? if(!has_post_format( 'video' )) : ?>
<div class="wrap">
	<div id="primary" class="content-area">
<? endif; ?>
<?php
	// Start the Loop.
	while ( have_posts() ) : the_post();

		/*
		 * Include the post format-specific template for the content. If you want to
		 * use this in a child theme, then include a file called called content-___.php
		 * (where ___ is the post format) and that will be used instead.
		 */
		if(has_post_format( 'video' )) {
			get_template_part( 'content-video', get_post_format() );
		}
		else {
			get_template_part( 'content', get_post_format() );
		}


		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}
	endwhile;
?>
		</div><!-- #primary -->
	<div class="sidebar-body"><?php get_sidebar(); ?></div>
</div> <!-- wrap -->
<? if(!is_category('video')) : ?>

<? endif; ?>
<? get_footer(); ?>
