<?php
/**
 * Template part for a top bar navigation
 *
 * Used to display the main navigation with
 * our custom Walker Class to make sure the
 * navigation is rendered the way Foundation
 * does.
 *
 * @since  EyeLikeDesign 0.5.0
 */
?>
            <!-- START: nav-eld.php -->
            <!-- <div class="contain-to-grid"> // enable to contain to grid -->
                <nav class="menu-bar">
                    <div class="navwrap">
                    <?php
                        wp_nav_menu( array(
                            'theme_location' => 'secondary',
                            'depth' => 0,
                            'items_wrap' => '<ul>%3$s</ul>',
                            'fallback_cb' => 'eyelikedesign_menu_fallback', // workaround to show a message to set up a menu
                        ) );
                    ?>
                    </div>
                </nav>
            <!-- </div> -->
            <!-- END: nav-eld.php -->