<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php twentyfourteen_post_thumbnail(); ?>
  <div id="socials-share" class='socials-share-fixed'>
    <a href="http://vk.com/share.php?url=<? the_permalink();?>&title=<? the_title();?>&description=f64 / Art and Fashion Magazine&image=IMG_PATH&noparse=true" target="_blank" class="fixed-vk" onclick="return Share.vk('<? the_permalink();?>','<? the_title();?>','IMG_PATH','f64 / Art & Fashion Magazine');"> Share</a>
    <a href="http://www.facebook.com/sharer/sharer.php?s=100&p%5Btitle%5D=<? the_title();?>&p%5Bsummary%5D=f64 / Art and Fashion Magazine&p%5Burl%5D=<? the_permalink();?>&p%5Bimages%5D%5B0%5D=IMG_PATH" target="_blank" class="fixed-fb" onclick="return Share.fb('<? the_permalink();?>','<? the_title();?>','IMG_PATH','f64 / Art & Fashion Magazine');">Share</a>
    <a href="https://twitter.com/intent/tweet?original_referer=http%3A%2F%2Ffiddle.jshell.net%2F_display%2F&text=<? the_title();?>&url=<? the_permalink();?>" target="_blank" class="fixed-tw" onclick="return Share.tw('<? the_permalink();?>','<? the_title();?>')">Share</a>
  </div>



<?php the_title( '<header class="entry-header"><h1 class="entry-title">', '</h1></header><!-- .entry-header -->' );
  ?>
   <ul class="article-categories">
    <?php 
    foreach((get_the_category()) as $category) {  
        echo '<li><a href="/?cat='.$category->cat_ID.'" class="'.strtolower($category->slug).'">'.$category->cat_name.'</a></li>';
    } 
    ?>
  </ul>
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
 
  <div class="entry-content">
    <?php the_content();?>
      <div class="tag-line"><? the_tags('tagged: '); ?></div>
    <?  edit_post_link( __( 'Edit', 'twentyfourteen' ), '<span class="wrap-edit-link">', '</span>' );
    ?>
  </div><!-- .entry-content -->
</article><!-- #post-## -->
