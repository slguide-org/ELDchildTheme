<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package EyeLikeDesign
 * @since EyeLikeDesign 0.3.0
 */

get_header(); ?>

	<!-- Row for main content area -->
	<?php get_template_part('content', 'slider'); ?>

<div class="greenbg">
	<div class="inner">
	<div class="row">

		<div class="nine columns centered text-center serif">
			<div class="post-box">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>

					<?php
						/**
						 * Seriously I never used comments on a page, what for?
						 */
						//comments_template( '', true );
					?>

				<?php endwhile; // end of the loop. ?>

			</div>
		</div>
		</div>
	</div>

	</div>

	<div class="row collapse full-width homeboxes">
		<?php
			$i = 0;
			$r = 1;
		// check if the repeater field has rows of data
		if( have_rows('boxes') ):
		 	// loop through the rows of data
		    while ( have_rows('boxes') ) : the_row(); 
		  	if($i % 2 == 0) {
		  		$class1 = '';
		  		$class2= '';
		  	
		  	} else {
		  		$class1 = 'push-6';
		  		$class2 = 'pull-6';
		  	}
		  		echo '<div id="jump-'.$r.'">';
		  		echo '<div data-mh="homeboxes-'.$i.'" class="six columns '.$class1.' imageholder" style="background-image:url('.wp_get_attachment_image_src( get_sub_field('image'), 'full', $icon )[0].')">';
		  		echo wp_get_attachment_image( get_sub_field('image'), 'full', false );
		  		echo '</div>';
		  		echo '<div data-mh="homeboxes-'.$i.'" class="six columns '.$class2.'"><div class="centerer"><div class="row"><div class="nine columns centered"><div class="inner">' . get_sub_field('content') . '</div></div></div></div></div>';
		  	echo '</div>
		  	<div class="clearfix"></div>';
				$i++;
				$r++;
		    endwhile;
		
		else :
		
		    // no rows found
		
		endif;
		
		?>
	</div>

<?php get_footer(); ?>