<?php

function front_end_slider($images, $paramssld, $slider)
{
 ob_start();
	$sliderID=$slider[0]->id;
	$slidertitle=$slider[0]->name;
	$sliderheight=$slider[0]->sl_height;
	$sliderwidth=$slider[0]->sl_width;
	$slidereffect=$slider[0]->slider_list_effects_s;
	$slidepausetime=($slider[0]->description+$slider[0]->param);
	$sliderpauseonhover=$slider[0]->pause_on_hover;
	$sliderposition=$slider[0]->sl_position;
	$slidechangespeed=$slider[0]->param;
	
	$slideshow_title_position = explode('-', trim($paramssld['slider_title_position']));
	$slideshow_description_position = explode('-', trim($paramssld['slider_description_position']));
	
?>

	<?php
		  $args = array(
    'numberposts' => 10,
    'offset' => 0,
    'category' => 0,
    'orderby' => 'post_date',
    'order' => 'DESC',
    'post_type' => 'post',
    'post_status' => 'draft, publish, future, pending, private',
    'suppress_filters' => true );

    $recent_posts = wp_get_recent_posts( $args, ARRAY_A );
	//print_r($recent_posts);
	//echo get_the_post_thumbnail(1, 'thumbnail');
 $image = wp_get_attachment_image_src( get_post_thumbnail_id( 1 ), 'thumbnail' );

	?>
	<div id="category-slider-<?php echo $sliderID; ?>" class="slider main-slider">
      <?php
      $current_pos = 0;
      ?>
		
	  <!-- ##########################IMAGES######################### -->
      <div  class="slider-viewport">        
        <div class="slider-body">
          <div class="init-slides">
            
			  <?php
			  $i=0;
			  foreach ($images as $key => $image_row) {					
					$target="fullsize";
					if ($image_row->link_target=="on"){$target='quater-slide';}
					?>
					  <div class="slide-item <?php echo $target; ?>">
						<?php if($image_row->sl_url!=""){ 							
							echo '<a href="'.$image_row->sl_url.'" class="slider-image" >';
						} ?>
						<img src="<?php echo $image_row->image_url; ?>" image_id="<?php echo $image_row->id; ?>" />
						<?php if($image_row->sl_url!=""){ echo '</a>'; }?>		
						<div class="slide-title <?php if(trim($image_row->name)=="") echo "none"; ?>">
							<h2><?php echo $image_row->name; ?></h2>
						</div>
						<div class="slide-description <?php if(trim($image_row->description)=="") echo "none"; ?>">
							<span><?php echo $image_row->description; ?></span>
						</div>
					  </div>
					  <?php
					$i++;
				} 
			  ?>
			  </div>
          </div>
        </div>
      </div>
	  <?php 
	return ob_get_clean();
}  
?>

