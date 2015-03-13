<?php
    $i = 0;
    $args = array(
            'category_name' => 'video',
            'post__in' => get_option( 'sticky_posts' ),
            'posts_per_page'=>-1
        );
    $stickyposts = new WP_Query( $args );
?>
<? if (is_single()) : ?>
<section id="video-section" class="video-section video-post">
    <div class="video-wrap">
        <div class="wrap">
            <div class="video-embed">
            </div>
            <div class="inner-title">
				<h3><? the_title(); ?></h3>
            </div>
            <?  if ($stickyposts->have_posts()) :  ?>
                <div id="video-carousel" class="carousel">
                    <div class="slider-viewport">
                        <div class='slider-body'>
                            <div class="slide">
                                <?php  while($stickyposts->have_posts()) : ?>
                                    <?php $stickyposts->the_post(); ?>
                                    <? $i++; if ($i%5 == 0) { echo "<div class='slide'>"; } ?>
                                    <?php get_template_part('content-carousel'); ?>
                                    <? if ($i%4 == 0) { echo "</div>"; } ?>
                                <?php endwhile;  ?>
                            </div>
                        </div>
                    </div>
                </div>            
            <? endif;  wp_reset_postdata(); ?>
        </div>
        <!-- end wrap -->
</section>
<div class="content video-post-content entry-content">
	<div class="wrap">
		<div id="primary" class="content-area">
            <table class="social-buttons">
        <tbody>
            <tr>
                <td class='tw'><a href="https://twitter.com/share" class="twitter-share-button" data-via="64_mag">Tweet</a></td>
                <td class='fb'><div class="fb-share-button" data-href="<?php the_permalink();?>" data-layout="button_count"></div></td>
                <td class='vk'><script type="text/javascript">document.write(VK.Share.button());</script></td>
                <td class='pin'><a href="//www.pinterest.com/pin/create/button/" data-pin-do="buttonBookmark"  data-pin-color="white"><img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_white_20.png" /></a></td>
            </tr>
        </tbody>
    </table>
		<?php
			the_content();?>
			<div class="tag-line"><? the_tags('tagged: '); ?></div>
<?	edit_post_link( __( 'Edit', 'twentyfourteen' ), '<span class="wrap-edit-link">', '</span>' ); ?>
<?endif;?>



