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
				<div id="filter-it">
				<div class="nine columns">
				<form class="controls" id="Filters">
				  <!-- We can add an unlimited number of "filter groups" using the following format: -->
				  <h5>FILTERS</h5>
				  <?php 
				  $terms = get_terms(array(
				      'hide_empty' => false,
				      'taxonomy' => 'directory_category'
				  ) );?>
				  	<?php foreach ($terms as $term) {
				  		echo '<button class="filter button" data-filter="category-'.$term->slug.'">'.$term->name.'</button>';
				  	} ?>
				  
				  <button id="Reset" class="button">See All</button>
				</form>
				</div>
				<div class="three columns">
					<input class="search" placeholder="Search" />
					<p style="font-size:12px;"><strong>Search by keyword or location.</strong></p>
				</div>
				<div class="clearfix"></div>

				<div class="list">
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
				 </div>
				 <ul class="pagination"></ul>
			</div>
		</div><!-- /#main -->
		</div>
		</div>
	</div><!-- End Content row -->

<?php get_footer(); ?>