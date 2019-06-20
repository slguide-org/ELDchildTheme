<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package EyeLikeDesign
 * @since EyeLikeDesign 0.1.0
 */
get_header(); ?>

	<!-- Row for main content area -->
	<div id="content" class="row">
		<div class="twelve columns coursesTopContent">
			<div class="inner">
			<?php
			$args = array(
				'page_id' => 181
				);
			// The Query
			$top_content_query = new WP_Query( $args );

			// The Loop
			if ( $top_content_query->have_posts() ) {
				
				while ( $top_content_query->have_posts() ) {
					$top_content_query->the_post();
						the_content();
				}
				
				/* Restore original Post Data */
				wp_reset_postdata();
			} else {
				// no posts found
			}
			?>
			</div>
			<hr/>
		</div>
		<div id="main" class="eight columns" role="main">
			<div class="post-box">
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to overload this in a child theme then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'content', get_post_format() );
					?>

				<?php endwhile; ?>

			<?php else : ?>
				<?php //get_template_part( 'content', 'none' ); ?>
			<?php endif; ?>

			<?php if ( function_exists( 'eyelikedesign_pagination' ) ) {
				eyelikedesign_pagination();
			} ?>

			</div>
		</div>

		<aside id="sidebar" class="four columns" role="complementary">
			<div class="sidebar-box">
				<?php get_sidebar(); ?>
			</div>
		</aside><!-- /#sidebar -->
	</div>
<?php get_footer(); ?>