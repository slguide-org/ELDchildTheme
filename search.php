<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package EyeLikeDesign
 * @since EyeLikeDesign 0.1.0
 */

get_header(); ?>

	<!-- Row for main content area -->
	<div id="content" class="row">

		<div id="main" class="twelve columns" role="main">
			<div class="post-box">

			<?php if ( have_posts() ) : ?>

				<?php 
				if($_GET['post_type'] == 'directory_listing') {
					echo "<h2>Directory Listings Search Results for: " . $s;
					echo '<hr/>';
				} else {
					eyelikedesign_archive_title(); 
				} ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to overload this in a child theme then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						if($post->post_type == 'directory_listing') {
							get_template_part( 'content', 'directory_listing' );
						} else {
						get_template_part( 'content', get_post_format() );
					}
					?>

				<?php endwhile; ?>

			<?php else : ?>
				<?php get_template_part( 'content', 'none' ); ?>
			<?php endif; ?>

			<?php if ( function_exists( 'eyelikedesign_pagination' ) ) {
				eyelikedesign_pagination();
			} ?>

			</div>
		</div>
	</div>
<?php get_footer(); ?>