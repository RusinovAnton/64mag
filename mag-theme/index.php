<?php get_header(); ?>

<div class="wrap">
	<?php echo do_shortcode('[huge_it_slider id="16"]'); ?>
<section id="content" class="content grid grid-justified">
		<?php echo do_shortcode('[ajax_load_more post_type="post" posts_per_page="14" scroll="false" button_label="more posts"]'); ?>
</section>
<?php get_sidebar('footer'); ?>
</div> <!-- wrap -->
<? get_footer(); ?>
