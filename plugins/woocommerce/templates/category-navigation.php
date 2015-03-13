<?php
  $taxonomy     = 'product_cat';
  $orderby      = 'name';  
  $show_count   = 0;      // 1 for yes, 0 for no
  $pad_counts   = 0;      // 1 for yes, 0 for no
  $hierarchical = 1;      // 1 for yes, 0 for no  
  $title        = '';  
  $empty        = 0;
$args = array(
  'taxonomy'     => $taxonomy,
  'orderby'      => $orderby,
  'show_count'   => $show_count,
  'pad_counts'   => $pad_counts,
  'hierarchical' => $hierarchical,
  'title_li'     => $title,
  'hide_empty'   => $empty
);
?>
<nav class="shop-cats-nav">
	<ul class="shop-categories">
	<?php $all_categories = get_categories( $args );
		//print_r($all_categories);
		foreach ($all_categories as $cat) {
		    //print_r($cat);
		    if($cat->category_parent == 0) {
		        $category_id = $cat->term_id;

		?>      

			<?php
		        echo '<li><a href="'. get_term_link($cat->slug, 'product_cat') .'">'. $cat->name .'</a></li>'; ?>

		    <?php    }
		     }     
		
	?>
	</ul>
</nav>