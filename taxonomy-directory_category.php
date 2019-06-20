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
		<div class="inner">
		<div id="main" class="twelve columns" role="main">
			<div class="post-box">
				<div id="filter-it">
			<?php if ( have_posts() ) : ?>
				<?php
					/* Queue the first post, that way we know
					 * what author we're dealing with (if that is the case).
					 *
					 * We reset this later so we can run the loop
					 * properly with a call to rewind_posts().
					 */
					the_post();

					/* Get the archive title for the specific archive we are
					 * dealing with.
					 */
					//eyelikedesign_archive_title();
					echo '<h2>Directory Listings: '.single_term_title('', false) .'</h2>';
					echo '			<div class="text-center">
					<input class="search" placeholder="Search" />
					<p style="font-size:12px;"><strong>Search by keyword or location.</strong></p>
				</div>';
					echo '<hr/>';
					/* Since we called the_post() above, we need to
					 * rewind the loop back to the beginning that way
					 * we can run the loop properly, in full.
					 */
					rewind_posts();
				?>
				
				<?php /* Start the Loop */ ?>
				<div class="list">
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to overload this in a child theme then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'content', 'directory_listing');
					?>

				<?php endwhile; ?>
			</div>
			<ul class="pagination"></ul>
			<?php else : ?>
				<?php get_template_part( 'content', 'none' ); ?>
			<?php endif; ?>

			<?php if ( function_exists( 'eyelikedesign_pagination' ) ) {
				eyelikedesign_pagination();
			} ?>

			</div>
		</div>
		</div>
	</div>
	</div>
<?php get_footer(); ?>