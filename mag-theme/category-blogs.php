<?php get_header(); ?>
<?php
	$id = get_cat_id( single_cat_title("",false) );
	$cat = get_category($id);
	$category = $cat->slug;
?>
<section class="blog-body">
<?php echo do_shortcode('[ajax_load_more post_type="post" repeater="blog" scroll="false" posts_per_page="7" button_label="more posts" category="'.$category.'"]'); ?>
</section>
<div class="sidebar-body">
<? get_sidebar(); ?>
</div>
</div>
<div class="wrap">
<h1 class='page-title'>SEE OTHER POSTS</h1>
    <section id="content" class="content grid grid-justified">
        <?php echo do_shortcode('[ajax_load_more post_type="post" scroll="false" posts_per_page="14" button_label="more posts"]'); ?>
    </section>
<?php get_sidebar('footer');?>
</div> <!-- wrap -->
<?
get_footer();