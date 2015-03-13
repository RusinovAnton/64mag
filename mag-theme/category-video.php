<?php get_header(); ?>
<?php

    $id = get_cat_id( single_cat_title("",false) );
    $cat = get_category($id);
    $category = $cat->slug;

        $i = 0;
        $do = true;
        $args = array(
                'category_name' => 'video',
                'post__in' => get_option( 'sticky_posts' ),
                'posts_per_page'=>-1
            );
        $stickyposts = new WP_Query( $args );
?>
<section id="video-section" class="video-section">
<?php  if ($stickyposts->have_posts()) :  ?>
    <div class="video-wrap">
        <div class="wrap">
            <div class="video-embed">
            </div>
            <div class="inner-title">
            </div>
            <div id="video-carousel" class="carousel">
                <div class="slider-viewport">
                    <div class='slider-body'>
                         <div class="slide">
                            <?php  while($stickyposts->have_posts()) : ?>
                                <?php $stickyposts->the_post(); ?>
                                <?php if ($do) : ?>
                                    <div class="vid"><p class="the-vid"><?php the_content() ?></p></div>
                                    <?php $do = false; ?>
                                <?php endif; ?>
                                <?php get_template_part('content-carousel'); ?>
                                <?php $i++; if ($i%4 == 0) { echo "</div><div class='slide'>"; } ?>
                            <?php endwhile;  ?>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif;  wp_reset_postdata(); ?>
</section>
<div class="wrap">    
<?php if (have_posts()) :?>
    <section class="video-list content">
        <div class="video-list-body grid col-4">
            <?php echo do_shortcode('[ajax_load_more post_type="post" scroll="false" posts_per_page="12" button_label="more posts" category="'. $category .'"]'); ?>
         </div>
    </section>
<?php endif; ?>
<h1 class='page-title'>SEE OTHER POSTS</h1>
    <section id="content" class="content grid grid-justified">
        <?php echo do_shortcode('[ajax_load_more post_type="post" scroll="false" posts_per_page="14" button_label="more posts"]'); ?>
    </section>
<?php get_sidebar('footer');?>
</div> <!-- wrap -->
<? get_footer(); ?>