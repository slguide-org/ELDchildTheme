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
	<div id="content" class="row">

		<div id="main" class="twelve columns" role="main">
			<div class="inner">
			<div class="post-box">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>

				<?php endwhile; // end of the loop. ?>
				<hr/>
				<div class="text-center" style="margin-top:30px;">
					<h4>SEARCH</h4>
					<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
						<label class="hide" for="s"><?php _e( 'Search for:', 'eyelikedesign' ); ?></label>
					        	<input type="text" value="" name="s" id="s" placeholder="<?php _e( 'Type here and press enter', 'eyelikedesign' ); ?>">
					        	<input type="hidden" name="post_type" value="directory_listing" />
					</form>
					<p style="font-size:16px;"><strong>Search by keyword or location.</strong></p>
				</div>
				<hr/>
				  <!-- We can add an unlimited number of "filter groups" using the following format: -->
				  <h3 class="text-center">Categories</h3>
				  <?php 
				  $terms = get_terms(array(
				      'hide_empty' => false,
				      'taxonomy' => 'directory_category'
				  ) );
				  $break = count($terms);
				  $i = 1;
				  ?>
				  	<?php foreach ($terms as $term) {
				  		if ($i == 1) {
				  			echo '<div class="six columns">';
				  		}
				  		echo '<p style="margin-bottom:5px"><a href="/directory_category/'.$term->slug.'/">'.$term->name.'</a></p>';
				  		if($i == (round($break / 2))) {
				  			echo '</div><div class="six columns">';
				  		}
				  		if($i == $break) {
				  			echo '</div><div class="clearfix"></div>';
				  		}
				  		$i++;
				  	} ?>
				  <hr/>
				

				
				<?php 	/**
					 * The WordPress Query class.
					 * @link http://codex.wordpress.org/Function_Reference/WP_Query
					 *
					 */
					$args = array(
						
						
						//Type & Status Parameters
						'post_type'   => 'directory_listing',
						'post_status' => 'publish',
						'order'               => 'DESC',
						'orderby'             => 'name',
						'posts_per_page'         => -1,
					);
				
				$dir_query = new WP_Query( $args );
				// The Loop
				if ( $dir_query->have_posts() ) {
					
					while ( $dir_query->have_posts() ) {
						$dir_query->the_post();
						get_template_part('content', 'directory_listing');
					}
					/* Restore original Post Data */
					wp_reset_postdata();
				} else {
					// no posts found
				}
				 ?>
				 
				 
		</div><!-- /#main -->
		</div>
		</div>
	</div><!-- End Content row -->

<?php get_footer(); ?>