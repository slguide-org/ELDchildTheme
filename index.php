<?php
/**
 * The template for displaying all content.
 *
 * If there aren't any other templates present to
 * display content, it falls back to index.php
 *
 * @package EyeLikeDesign
 * @since EyeLikeDesign 0.1.0
 */

get_header(); ?>

	<!-- Row for main content area -->
	<div id="content" class="row">
	

			<div class="post-box">

			<?php if ( have_posts() ) : ?>
				<div class="inner">
					<div id="main" class="eight columns" role="main">
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', get_post_format() ); ?>

				<?php endwhile; ?>

			<?php else : ?>
				<div class="inner">
				<div id="main" class="twelve columns" role="main">
				<?php get_template_part( 'content', 'none' ); ?>
			<?php endif; ?>
		</div>
	</div>
			<?php if ( function_exists( 'eyelikedesign_pagination' ) ) {
				eyelikedesign_pagination();
			} ?>
			</div>

		</div><!-- /#main -->

		<aside id="sidebar" class="four columns" role="complementary">
			<div class="sidebar-box">
				<?php get_sidebar(); ?>
			</div>
		</aside><!-- /#sidebar -->
		</div>
	</div><!-- End Content row -->

<?php get_footer(); ?>