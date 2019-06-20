
<?php 
$classes = '';
$cats = get_the_terms($post->ID, 'directory_category');
	 foreach ($cats as $cat ) {
	 		$classes .= 'category-'.$cat->slug . ' ';
	 }
 ?>

<div class="row directoryListing animated item <?php echo $classes; ?>">


<div class="three columns">
	<?php the_post_thumbnail(); ?>
</div>
<div class="nine columns">
	<h3 class="name"><?php the_title(); ?></h3>
	<div class="directoryDescription">
		<p><?php the_field('directory_description'); ?></p>
	</div>
	<div class="directoryContact">
		<h5>Contact</h5>
			<?php if(get_field('directory_website')): ?>
				<div class="three columns">
					<p class="name"><a href="<?php the_field('directory_website') ?>" target="_blank" class="button">Visit Website</a></p>
					</div>
			<?php endif; ?>
			<?php if(get_field('directory_email')): ?>
				<div class="three columns">
					<p><a href="mailto:<?php the_field('directory_email') ?>" target="_blank" class="button">Email</a></p>
					</div>
			<?php endif; ?>
			<?php if(get_field('directory_phone')): ?>
				<div class="three columns">
					<p><strong>Phone:</strong><br/><?php the_field('directory_phone') ?></p>
					</div>
			<?php endif; ?>
			<?php if(get_field('directory_street_address') ||get_field('directory_street_address_2') || get_field('directory_city') || get_field('directory_country')): ?>
			<div class="three columns address">
			<strong>Address</strong><br/>
			<?php if(get_field('directory_street_address')): ?><?php the_field('directory_street_address'); ?><br/><?php endif; ?>
			<?php if(get_field('directory_street_address_2')): ?><?php the_field('directory_street_address_2'); ?><br/><?php endif; ?>
			<?php if(get_field('directory_city')): ?><p><?php the_field('directory_city'); ?>, <?php the_field('directory_state'); ?> <?php the_field('directory_zip'); ?><br/><?php endif; ?>
			<?php if(get_field('directory_country')): ?><?php the_field('directory_country') ?><?php endif; ?>
		<?php endif; ?>
			</div>
	</div>
</div>