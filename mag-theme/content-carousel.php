<article id="post-<?php the_ID(); ?>" class="article-item  <?php if(is_sticky()){echo ' article-featured';}?><?if ( has_post_format( 'video' )) {
  echo ' video';
}?>">
	<?php if ( ! post_password_required() && ! is_attachment() ) :?>
		 <a href="<?php the_permalink(); ?>" class="article-image"> <?php the_post_thumbnail(); ?> </a>
	<?php endif; ?>
	<a href="<?php the_permalink(); ?>" class="article-title">
        <h3><?php the_title(); ?></h3>
    </a>
	<div class="article-meta">
		<p class="article-p"><? the_excerpt() ?></p>				
	</div>
</article><!-- #post-## -->
