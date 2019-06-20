<?php 
/**
 * Template part for Flexslider
 *
 * Used to display slides and captions
 * via flexslider
 * navigation is rendered the way Foundation
 * does.
 * @package EyeLikeDesign
 * @since EyeLikeDesign 0.1.0
 */
?>

<!-- BEGIN: content-slider.php -->
 <?php
 
 // check if the repeater field has rows of data
 if( have_rows('slides') ):
   echo '<div class="flexslider regular loading">
                    <ul class="slides">';
  	// loop through the rows of data
     while ( have_rows('slides') ) : the_row();
 				$image = get_sub_field('image');
 				$caption = get_sub_field('caption');
 				$linkTo = get_sub_field('link_to'); ?>

 				<li>
 				  <?php echo wp_get_attachment_image( $image, 'full', false ); ?>
 				  <?php if($caption) : ?><div class="caption"><?php echo $caption; ?> 
 				  <?php if($linkto) : ?><p><a href="<?php echo $linkTo; ?>" class="button">Learn More</a></p> <?php endif; ?>
 				  </div>
 				<?php endif; ?>
 				</li>
 	<?php 
     endwhile;
     echo '</ul>
             </div>';
 else :
 
     // no rows found
 
 endif;
 
 ?>
<!-- END: content-slider.php -->