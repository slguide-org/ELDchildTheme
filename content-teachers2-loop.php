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

		// Add an unattached image to the media library
		if(!get_user_meta($user->id, 'wp_metronet_image_id', false)[0]) {
		// $image_url = get_user_meta($user->id, 'publicity_photo', false)[0];
		// $create_image = new JDN_Create_Media_File( $image_url );
		// $image_id = $create_image->attachment_id;
		// add_user_meta( $user->id, 'wp_metronet_image_id', $image_id );
		// add_user_meta($user->id, 'wp_metronet_avatar_override', 'on');
		}
		$pid = get_user_meta($user->id, 'wp_metronet_post_id');
		$mnimg = get_user_meta($user->id, 'wp_metronet_image_id', false);
		
		if($pid) {
			// echo '<p>have post_id</p>';
			// echo '<p>'.$pid[0].'<br/>'.intval($pid[0] + 1).'</p>';
			// add_user_meta( $user->id, 'wp_metronet_image_id', intval($pid[0] + 1) );
			// print_r();
			// delete_user_meta($user->id, 'wp_metronet_image_id');
			// add_user_meta($user->id, 'wp_metronet_image_id', $mnimg[0]);
			// echo $mnimg[0];
		} else {
				$pf = get_user_meta($user->id, 'publicity_photo', false);
			// echo '<pre>';
			$newimgarr = preg_split('/(gravity_forms\/)\S*(\/)/m', $pf[0]);
			// echo 'meta <pre>';
			// print_r($pf);
			// echo '</pre>';
			// echo 'Image name <pre>';
			// print_r($newimgarr);
			// echo '</pre>';
			$newimg = explode('.', $newimgarr[1]);
			// echo 'new image url :'. $newimg[0];
			// $newid = pippin_get_image_id($newimg[0]);
			// echo '</pre>';
			if($pf) {
				// echo $newid;
				// echo gettype($newid);
				// add_user_meta( $user->id, 'wp_metronet_image_id', $newid ); 
			}
		}
	?>

	<?php
	$uposts = false;
	$upost_id = false;
	$post_args = array(
			'post_type' => 'mt_pp',
			'author' => $user->id, 
			'post_status' => 'publish'
		);
		$uposts = get_posts( $post_args );
		if ( !$uposts ) {
			$upost_id = wp_insert_post( array(
				'post_author' => $user->id,
				'post_type' => 'mt_pp',
				'post_status' => 'publish',
			) );
		} else {
			$upost = end( $uposts );
			$upost_id = $upost->ID;
		}
		echo $upost_id;
			if(has_post_thumbnail( $upost_id )) {
				echo 'nothing to do';
			} else {
				if($wpimg){
					set_post_thumbnail($upost_id, $wpimg );
				}
			}
	 	echo '<pre>';
		//print_r(get_user_meta($user->id, false, false)); 
			// print_r($override);
		echo '</pre>';
	?>
		<!-- <h5 class="montserrat"><?php echo $user->display_name  ?></h5> -->
		<!-- <h6><?php the_field('byline', 'user_'.$user->id); ?></h6> -->
		<!-- <p class="text-center"><a href="#" data-reveal-id="teacher-<?php echo $user->id;?>" style="font-size:14px;">Read Bio</a></p> -->

	</div>

	<?php 
	if($i % 4 == 0) {echo '<div class="clearfix"></div>';}
	$i++;
}
} else {
	echo 'No users found.';
}
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


