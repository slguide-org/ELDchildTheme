<?php
/**
 * Template Name: Active Members Only
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

			<?php 
			$cur = get_current_user_id();
			if(WC_Subscriptions_Manager::user_has_subscription( $cur, '231', 'active' ) ||
				current_user_can('administrator') 
				) { ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>

				<?php endwhile; // end of the loop. ?>
				<?php } else { ?>
					<h4 class="text-center montserrat">You must be logged in, and an active member to use this page</h4>
					<?php if(is_user_logged_in() == false): ?>
						<div class="six columns centered"><?php wp_login_form( ); ?></div>
						<hr/>
					<?php endif; ?>
					<h3 class="text-center montserrat">Sustainable Living Guide Membership</h3>
					<p class="text-center"><a href="<?php echo get_permalink( 231 ); ?>" class="button">Join Now</a></p>
				<?php	} ?>
			</div>
		</div><!-- /#main -->
		</div>
	</div><!-- End Content row -->

<?php get_footer(); ?>