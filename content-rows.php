<?php
//Check for dynamic population of custom class field in functions.php.
//use get_template_part('content','rows'); to pull this field
//Check /custom-fields/rows.php to add other post-types to use this
/**
 * The template used for displaying page content in Rows Custom field
 *
 * @package EyeLikeDesign
 * @since EyeLikeDesign 0.1.0
 */
?>
    <!-- START: content-rows.php -->

    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      
        <div class="entry-content">
            <?php
            
            // check if the repeater field has rows of data
            if( have_rows('rowsELD') ):
                $r = 1;
                 // loop through the rows of data
                while ( have_rows('rowsELD') ) : the_row(); 
                         $addclasses = get_sub_field('additional_classes');
                         $constrain = get_sub_field('constrain_inner_content');
                                $classes = '';
                                if($addclasses) :
                                foreach ($addclasses as $addclass ) {
                                    $classes .= $addclass . ' ';
                                }
                                endif;
                                if(get_sub_field('full_or_standard') == 'full') : ?>
                                    <div class="row full-width <?php echo $classes; ?>">
                                    <?php if($constrain == 'yes' && (get_sub_field('full_or_standard') == 'full') ) { ?>
                                        <div class="row">
                                    <?php } ?>
                                <?php else: ?>
                                    <div class="row <?php echo $classes; ?>">
                                <?php endif; 

                                if(get_sub_field('content_above_columns')) {
                                    echo '<div style="padding-top:25px;">' . get_sub_field('content_above_columns') . '</div>';
                                }
                                $colwidth = get_sub_field('column_layout');
                                if( get_row_layout() == 'four_columns' ) {
                                    $colwidth = 'three$three$three$three';
                                }
                                $width = explode('$', $colwidth);
                        // check if the repeater field has rows of data
                        if( have_rows('columns') ):
                            $i = 0;
                             // loop through the rows of data
                            while ( have_rows('columns') ) : the_row();
                                //columns
                            ?> 
                                <div class="columns <?php echo $width[$i]; if(count($width) == 1) { echo ' centered ';} ?>" >
                                    <?php 
                                    $iorw = get_sub_field('image_or_wysiwyg');
                                    $img = get_sub_field('image');
                                    if($iorw == 'wysiwyg') {
                                        echo '<div class="inner">';
                                        the_sub_field('content');
                                        echo '</div>';
                                        } elseif($iorw == 'image') {
                                        
                                        echo wp_get_attachment_image( $img, 'full', false, array(
                                            'class' => 'aligncenter nomargin') );
                                     } else {
                                        echo '<div class="imageWithOverlay">';
                                        echo wp_get_attachment_image( $img, 'full', false, array(
                                            'class' => 'aligncenter nomargin') );
                                        echo '<div class="imageOverlay">';
                                        the_sub_field('content');
                                        echo '</div>
                                            </div>';
                                     } ?>
                                </div>
                            <?php 
                            $i++;
                            endwhile;
                        
                        else :
                        
                            // no rows found
                        
                        endif;
                        
                        ?>
                        <?php if($constrain == 'yes'&& (get_sub_field('full_or_standard') == 'full')) { ?>
                        </div>
                        <?php } ?>
                    </div> <!-- End Row -->

            <?php 
                $r++;
                endwhile;
            
            else :
            
                // no rows found
            
            endif;
            
            ?>

        </div><!-- .entry-content -->
    </div><!-- #post-<?php the_ID(); ?> -->
    <!-- END: content-page.php -->