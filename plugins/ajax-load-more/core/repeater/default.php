<article id="post-<?php the_ID(); ?>" class="article-item  <?php if(is_sticky()){echo ' article-featured';}?><?if ( has_post_format( 'video' )) {
  echo ' video';
}?><?php if(!has_post_thumbnail()) { echo ' no-thumbnail';} ?>">
  <?php if ( ! post_password_required() && ! is_attachment() && has_post_thumbnail()) :?>
     <a href="<?php the_permalink(); ?>" class="article-image"> <?php the_post_thumbnail(array(322,400)); ?> </a>
  <?php endif; ?>
  <span class="article-author">Author: <?php the_author(); ?></span>
  <ul class="article-categories">
<?php 
foreach((get_the_category()) as $category) {  
    echo '<li><a href="/?cat='.$category->cat_ID.'" class="'.strtolower($category->slug).'">'.$category->cat_name.'</a></li>';
} 
?>
</ul>
  <a href="<?php the_permalink(); ?>" class="article-title">
    <h3><?php the_title(); ?></h3>
  </a>
  <p class='article-p'>
    <?php the_excerpt(); ?>
  </p>
</article><!-- #post -->