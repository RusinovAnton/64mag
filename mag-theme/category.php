<?php get_header(); ?>
<?php if(is_category()){
		$id = get_cat_id( single_cat_title("",false) );
		$cat = get_category($id);
		$category = $cat->slug;	
	}
	$slider = 0;
	switch ($id) {
		case '64':
			$slider = 10;
			break;
		case '65':
			$slider = 11;
			break;
		case '66':
		$slider = 12;
		break;
		case '67':
		$slider = 13;
		break;
		case '68':
		$slider = 14;
		break;
		case '187':
		$slider = 17;
		break;
		default:
			$slider = 16;
			break;
	}
?>

	<div class="wrap">
<?php echo do_shortcode('[huge_it_slider id="'.$slider.'"]'); ?>
	<h1 class='page-title'><?php echo $cat->name; ?></h1>
	<section id="content" class="content grid grid-justified">
<?php echo do_shortcode('[ajax_load_more post_type="post" scroll="false" posts_per_page="14" button_label="more posts" category="' . $category . '"]'); ?>
	</section>

<?php
get_sidebar('footer');?>
</div> <!-- wrap -->
<?
get_footer();