<?php
/**
 * This is the template part for the header image
 *
 * What it does is simple, yet clever:
 * If you have custom-header support on, it will
 * check if you have a global header image, if you
 * don't but have a featured image big enough on your
 * page or post, it will display that. Else it will
 * display nothing.
 *
 * @since EyeLikeDesign 0.5.0
 */
?>
                    <!-- START: custom-header.php -->
                    <?php $header_image = get_header_image();
                    if(!is_singular('product' )) :
                    // So we have a header image, nice!
                    if ( $header_image ) {
                    ?>
                        
                    <?php
                        // If we have a thumbnail, we go for that.
                        if ( is_singular() && has_post_thumbnail( $post->ID ) ) {
                            // Houston, we have a new header image!
                            echo get_the_post_thumbnail( $post->ID, 'large-feature' );
                        // Let's go with the header image
                        } else {
                        ?>
                            <img src="<?php header_image(); ?>" alt="" />
                        <?php
                        }
                    ?>
                        
                    <?php
                    // So there was no header image, but we still have a nice thumbnail, right?
                    } else if ( is_singular() && has_post_thumbnail( $post->ID )  && !is_singular('sfwd-courses')) {
                    ?>
                    <?php
                    
                         $bgimg = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
                        // Houston, we have a new header image!
                    echo '<div class="parallax-window" data-parallax="scroll" data-speed="0.2" data-image-src="'.$bgimg[0] . '" data-natural-height="'.$bgimg[2].'" data-natural-width="'.$bgimg[1].'"></div>';
                    ?>
                    <?php
                    }
                    if(is_post_type_archive( 'sfwd-courses' )) {

                      $bgimg = wp_get_attachment_image_src( get_post_thumbnail_id(181), 'full');
                        // Houston, we have a new header image!
                    echo '<div class="parallax-window" data-parallax="scroll" data-speed="0.2" data-image-src="'.$bgimg[0] . '" data-natural-height="'.$bgimg[2].'" data-natural-width="'.$bgimg[1].'"></div>';

                    }
                    if(is_post_type_archive('earthkids')) {
                             $bgimg = wp_get_attachment_image_src( get_post_thumbnail_id(35), 'full');
                            // Houston, we have a new header image!
                        echo '<div class="parallax-window" data-parallax="scroll" data-speed="0.2" data-image-src="'.$bgimg[0] . '" data-natural-height="'.$bgimg[2].'" data-natural-width="'.$bgimg[1].'"></div>';
                    }
                    if(is_home() ) {
                             $bgimg = wp_get_attachment_image_src( get_post_thumbnail_id(140), 'full');
                            // Houston, we have a new header image!
                        echo '<div class="parallax-window" data-parallax="scroll" data-speed="0.2" data-image-src="'.$bgimg[0] . '" data-natural-height="'.$bgimg[2].'" data-natural-width="'.$bgimg[1].'"></div>';
                    }
                      if(is_shop()) {
                             $bgimg = wp_get_attachment_image_src( get_post_thumbnail_id(155), 'full');
                            // Houston, we have a new header image!
                        echo '<div class="parallax-window" data-parallax="scroll" data-speed="0.2" data-image-src="'.$bgimg[0] . '" data-natural-height="'.$bgimg[2].'" data-natural-width="'.$bgimg[1].'"></div>';
                    }
                endif;
                    ?>
                    <!-- END: custom-header.php -->