<?php
/**
 * The template for displaying all single posts.
 *
 * This is the template that displays all single posts by default.
 * Please note that this is the WordPress construct of posts
 * and that other 'posts' on your WordPress site will use a
 * different template.
 *
 * @package EyeLikeDesign
 * @since EyeLikeDesign 0.3.0
 */

get_header(); ?>

	<!-- Row for main content area -->
	<div id="content" class="row">
	<div class="inner">
		<div id="main" class="twelve columns" role="main">

			<div class="post-box">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', get_post_format() ); ?>

					<?php eyelikedesign_single_content_nav( 'nav-below' ); ?>

					<?php comments_template( '', true ); ?>

				<?php endwhile; ?>

			</div>

		</div><!-- /#main -->

		</div>
	</div><!-- End Content row -->

<?php get_footer(); ?>