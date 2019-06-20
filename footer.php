<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the class=container div and all content after
 *
 * @package EyeLikeDesign
 * @since EyeLikeDesign 0.1.0
 */
?>
		<?php
			/*
				A sidebar in the footer? Yep. You can can customize
				your footer with three columns of widgets.
			*/
			if ( ! is_404() )
				get_sidebar( 'footer' );
			?>
			<div class="darkgreenbg">
			<div class="inner">
			<div id="footer" class="row" role="contentinfo">
			<div class="four columns">
					<p><a href="https://sustainablelivingguide.org/product/sustainable-living-guide-membership/" class="button whitebutton">BECOME A MEMBER</a></p>
				</div>
				<div class="four columns text-center">
					
					
					<p>
						<span class="serif">FOLLOW US</span><br/>
						<a href="https://www.facebook.com/SustainableLivingGuide/" target="_blank" class="">
						<span class="fa-stack fa-lg">
						  <i class="fa fa-circle fa-stack-2x"></i>
						  <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
						</span>
					</a>
						<a href="https://www.instagram.com/SustainableLivingGuide/" target="_blank" class="">
						<span class="fa-stack fa-lg">
						  <i class="fa fa-circle fa-stack-2x"></i>
						  <i class="fa fa-instagram fa-stack-1x fa-inverse"></i>
						</span>
					</a>
						<a href="https://www.youtube.com/channel/UCJffYyT6LfDddkPqYmAqU7A?" title="YouTube"><img src="https://sustainablelivingguide.org/wp-content/themes/ELDchildTheme/images/youtube_125x53.png" alt="     YouTube Channel">
<span class="fa-stack fa-lg">
</span></a>
					</p>
					</div>
					<div class="four columns">
						
						<p><a href="#" data-reveal-id="emailModal" class="button whitebutton">JOIN OUR EMAIL LIST</a></p>
				</div>
				<div class="twelve columns" style="margin-top:40px;">
				<h5 class="whitetext text-center" ><a href="https://www.instagram.com/SustainableLivingGuide/" target="_blank" class="serif" style="color:#f9f9f9;">SUSTAINABLE LIVING GUIDE ON INSTAGRAM</a></h5>
				<?php echo do_shortcode('[instagram-feed]'); ?>
			</div>
			</div>
			
			</div>
			</div>
	</div><!-- Container End -->
 <a class="exit-off-canvas"></a>
 <?php get_template_part('content', 'email-modal'); ?>


  </div>
</div>

	<!-- Prompt IE 6 users to install Chrome Frame. Remove this if you want to support IE 6.
	     chromium.org/developers/how-tos/chrome-frame-getting-started -->
	<!--[if lt IE 7]>
		<script defer src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
		<script defer>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
	<![endif]-->

	<?php wp_footer(); ?>



</body>
</html>
