<h3 class="greentext text-center">Our Teachers</h3>

<?php
$args = array(
//	'role' => "group_leader",
	'role' => "wdm_instructor",
	'orderby' => 'display_name',
	'exclude' => 5,
);

// The Query
$user_query = new WP_User_Query( $args );

// User Loop
if ( ! empty( $user_query->get_results() ) ) {
	$members = $user_query->get_results();
	//Sort by last name
	uasort( $members, function ( $a, $b ){
		$a->first_name = strtolower( $a->first_name );
		$a->last_name = strtolower( $a->last_name );
		$b->first_name = strtolower( $b->first_name );
		$b->last_name = strtolower( $b->last_name );
		if ( $a->last_name == $b->last_name ) {
			if( $a->first_name < $b->first_name ) {
				return -1;
			}
			else if ($a->first_name > $b->first_name ) {
				return 1;
			}
			//last name and first name are the same
			else {
				return 0;
			}
		}
		return ( $a->last_name < $b->last_name ) ? -1 : 1;
	});
	//End Sort

	$i = 1;
	foreach ( $members as $user ) {

		$bio = get_the_author_meta( 'user_description', $user->id );
		$modals;
		?>
	<div class="three columns text-center">
<?php 
					$wpimg = get_user_meta($user->id, 'wp_metronet_image_id', false);
					$wpimg = $wpimg[0];
					$img = wp_get_attachment_image($wpimg, '400Square', false, array(
						'alt' => $user->display_name, 
		        'class' =>  'aligncenter rounded',
					));
					$bigimg = wp_get_attachment_image($wpimg, 'medium', false, array(
						'alt' => $user->display_name, 
		        'class' =>  'aligncenter',
					));
				// if (function_exists ( 'mt_profile_img' ) ) {
				//    $img = mt_profile_img( $user->id, array(
				//         'size' => '400Square',
				//         'attr' => array( 
				//         'alt' => $user->display_name, 
				//         'class' =>  'aligncenter rounded',
				//       	),	
				//         'echo' => false )
				//     );
				// 	   $bigimg = mt_profile_img( $user->id, array(
				// 	        'size' => 'medium',
				// 	        'attr' => array( 
				// 	        'alt' => $user->display_name, 
				// 	        'class' =>  'aligncenter',
				// 	      	),	
				// 	        'echo' => false )
				// 	    );
				// 	}

		if($img) {
			echo $img;
		} else {
			echo wp_get_attachment_image( 264, '400Square' );
		}
	?>
		<h5 class="montserrat"><?php echo $user->display_name  ?></h5>
		<h6><?php the_field('byline', 'user_'.$user->id); ?></h6>
		<p class="text-center"><a href="#" data-reveal-id="teacher-<?php echo $user->id;?>" style="font-size:14px;">Read Bio</a></p>
		<?php if(current_user_can('administrator')) { ?>
<p class="text-center"><a href="<?php echo get_edit_user_link($user->id); ?>" target="_blank">Edit User</a></p>
<?php } ?>
		<?php 
		$modals .= '
		<div id="teacher-'.$user->id.'" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
			'.$bigimg.'
			<h5 class="text-center montserrat">'.$user->display_name.'</h5>
			<h6 class="text-center">'.get_field('byline', 'user_'.$user->id).'</h6>
			<div style="line-height:1.4">'.$bio.'</div>
  		<a class="close-reveal-modal" aria-label="Close">&#215;</a>
		</div>'; ?>
	</div>

	<?php 
	if($i % 4 == 0) {echo '<div class="clearfix"></div>';}
	$i++;
}
} else {
	echo 'No users found.';
}
echo '<div class="moveme">'.$modals.'</div>';
?>
<div class="clearfix"></div>
<?php

	/*
	 * The WordPress Query class.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/WP_Query
	 */
	$args = array(
		'page_id'      => 764,
	);
$the_query = new WP_Query( $args );

// The Loop
if ( $the_query->have_posts() ) {

	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		the_content();
	}
	/* Restore original Post Data */
	wp_reset_postdata();
} else {
	// no posts found
}
 ?>
