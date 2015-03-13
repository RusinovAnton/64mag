<?php
/**
 * The Footer Sidebar
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */


?>

<div id="supplementary">
	<div id="footer-sidebar" class="footer-sidebar widget-area" role="complementary">
	<?php if(!is_category('exhibitions')) : ?>
		<aside id='exhibitions-widget' class="widget masonry-brick textwidget" >
		    <h1 class="widget-title">EXHIBITIONS</h1>
		    <section>
		    <ul class="link-list">
		    	<?php
		    		$query = new WP_Query( array(
		    				'category_name' => 'exhibitions',
		    				'posts_per_page' => '8',
		    			) );
		    		
		    		if ( $query->have_posts() ) :
						while ( $query->have_posts() ) :							
							$query->the_post();?>
							<li><a href="<?php the_permalink();?>"> <?php echo get_the_title();?> </a></li>
				<?php
							
						endwhile;
					endif;
				?>
				
		    </ul>
		    <ul class="link-thumbs">
		    	<?php 
		    			    		
		    		if ( $query->have_posts() ) :
						while ( $query->have_posts() ) :
							$query->the_post();?>
							<li><a href="<?php the_permalink(); ?>" class="article-image"> <?php the_post_thumbnail( array(322, 1000)); ?> </a></li>
				<?php
							
						endwhile;
					endif;
		    	wp_reset_postdata(); ?>	
		    </ul>
			</section>		
			<a href="category/artculture/exhibitions" class="btn view-all">View All</a>    
		</aside>
		<? endif; ?>		
		<?php dynamic_sidebar( 'sidebar-3' ); ?>
	</div><!-- #footer-sidebar -->
</div><!-- #supplementary -->
