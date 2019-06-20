<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package EyeLikeDesign
 * @since EyeLikeDesign 0.1.0
 */
?>
    <!-- START: content-page.php -->
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="entry-content">
            <?php the_content(); ?>
            <?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'eyelikedesign' ) . '</span>', 'after' => '</div>' ) ); ?>
        </div><!-- .entry-content -->
    </article><!-- #post-<?php the_ID(); ?> -->
    <!-- END: content-page.php -->