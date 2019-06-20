<?php
/**
 * Template Name: Flexible Content
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

	
<?php while ( have_posts() ) : the_post(); ?>
	
	<?php get_template_part('content', 'rows'); ?>

	
<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>