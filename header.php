<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package EyeLikeDesign Child
 * @since EyeLikeDesign Child 0.1.0
 */
?><!DOCTYPE html>

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri(); ?>/images/devices/apple-touch-icon.png">
<link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/images/devices/favicon-32x32.png" sizes="32x32">
<link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/images/devices/favicon-16x16.png" sizes="16x16">
<link rel="manifest" href="<?php echo get_stylesheet_directory_uri(); ?>/images/devices/manifest.json">
<link rel="mask-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/devices/safari-pinned-tab.svg" color="#35b44a">
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/devices/favicon.ico">
<meta name="msapplication-config" content="<?php echo get_stylesheet_directory_uri(); ?>/images/devices/browserconfig.xml">
<meta name="theme-color" content="#f9f9f9">
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/stylesheets/animate.css" />

  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-117420801-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-117420801-1');
</script>
	<!-- IE Fix for HTML5 Tags -->
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

<?php
	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
<script src="https://use.fontawesome.com/cedbe43ece.js"></script>
<style>
.path-burger {
  position: absolute;
  top: 0;
  left: 0;
  height: 68px;
  width: 68px;
  -webkit-mask: url(#mask);
          mask: url(#mask);
  -webkit-mask-box-image: url(/wp-content/themes/ELDchildTheme/images/mask.svg);
}
</style>
<?php if(is_front_page()) { ?>
  <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/javascripts/flexslider/flexslider.css">
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/javascripts/flexslider/jquery.flexslider-min.js"></script>
  <script>
  (function($) {
    $(window).load(function() {
      $('.flexslider.regular').flexslider({
        animation: "fade",
        'directionNav': false,
        'smoothHeight': true,
        start: function(slider) {
          slider.removeClass('loading');
        }
      });
    });
  })(jQuery);
 </script>   
 <?php } ?>
 <script src="<?php echo get_stylesheet_directory_uri(); ?>/javascripts/jquery.matchHeight-min.js" type="text/javascript"></script>
 <script>
  (function($) {
    $(document).ready( function() {
      $('.matcher>.columns').matchHeight();
    });
  })(jQuery);
 </script>
<script src="<?php echo get_stylesheet_directory_uri() ?>/javascripts/parallax.min.js"></script>
<script>
  (function($) {
    $(document).ready( function() {
      $('.parallax-window').parallax();
    });
  })(jQuery);
</script>   
 
  <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.0.0/list.min.js"></script>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/javascripts/jquery.highlight.js"></script>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/javascripts/list.pagination.min.js"></script>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/javascripts/mixitup/build/jquery.mixitup.min.js"></script>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/javascripts/directory.js" type="text/javascript" charset="utf-8" async defer></script>
<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window,document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
 fbq('init', '195594564380086'); 
fbq('track', 'PageView');
</script>
<noscript>
 <img height="1" width="1" 
src="https://www.facebook.com/tr?id=195594564380086&ev=PageView
&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->

</head>
<body <?php body_class(); ?>>
	<!-- Start the main container -->
	<div class="off-canvas-wrap" data-offcanvas>
  <div class="inner-wrap">

   
    <!-- Off Canvas Menu -->
    <aside class="right-off-canvas-menu">
        	<?php
        		/**
        		 * Include the default navigation
        		 *
        		 * You could easily do something like:
        		 * if ( is_front_page() ) {
        		 * 	get_template_part( 'nav', 'front-page' ); // nav-front-page.php
        		 * } else {
        		 * 	get_template_part( 'nav' );	// nav.php
        		 * }
        		 */
        		if ( ! is_page_template( 'page-templates/off-canvas-page.php' ) ) {
        			get_template_part( 'nav', 'off-canvas' );
        		}
        	?>
    </aside>


    <?php
    $args = array(
      'page_id' => 497,
      'post_status' => 'publish'
      );
    // The Query
    $top_content_query = new WP_Query( $args );

    // The Loop
    if ( $top_content_query->have_posts() ) {
      
      while ( $top_content_query->have_posts() ) {
        $top_content_query->the_post();?>
            <div class="greenbg">
              <div class="row">
                <div class="twelve columns text-center">
                  <?php the_content(); ?>
                </div>
              </div>
            </div>
      <?php }
      
      /* Restore original Post Data */
      wp_reset_postdata();
    } else {
      // no posts found
    }
    ?>


	<div id="container" class="container animated" role="document">

		<!-- Row for blog navigation -->
		<div class="whitebg headershadow">
		<div class="row full-width">
			<header class="twelve columns eld-header">
				
					<div class="three columns">
						<h1 id="site-title"><span><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/slg-logo.png" alt="<?php bloginfo( 'name' ); ?>" /></a></span></h1>
					</div>
          
					<div class="one columns text-right hamburgerholder push-8">
						<a class="right-off-canvas-toggle" href="#" ><div id="hamburger" class="hamburglar">

    <div class="burger-icon">
      <div class="burger-container">
        <span class="burger-bun-top"></span>
        <span class="burger-filling"></span>
        <span class="burger-bun-bot"></span>
      </div>
    </div>
    
    <!-- svg ring containter -->
    <div class="burger-ring">
      <svg class="svg-ring">
	      <path class="path" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="4" d="M 34 2 C 16.3 2 2 16.3 2 34 s 14.3 32 32 32 s 32 -14.3 32 -32 S 51.7 2 34 2" />
      </svg>
    </div>
    <!-- the masked path that animates the fill to the ring -->
    
 		<svg width="0" height="0">
       <mask id="mask">
    <path xmlns="http://www.w3.org/2000/svg" fill="none" stroke="#ff0000" stroke-miterlimit="10" stroke-width="4" d="M 34 2 c 11.6 0 21.8 6.2 27.4 15.5 c 2.9 4.8 5 16.5 -9.4 16.5 h -4" />
       </mask>
     </svg>
    <div class="path-burger">
      <div class="animate-path">
        <div class="path-rotation"></div>
      </div>
    </div>
      
  </div>
  <span class="words">menu</span></a>
					</div>
			<div class="eight columns pull-1">
            <?php get_template_part('nav', 'menu-bar'); ?>
          </div>

				
			</header>



			</div>
		</div>
<?php
          /**
           * Include our custom-header.php
           *
           * Used with the header image stuff.
           */
          get_template_part( 'custom-header' );
        ?>

    <!-- // header.php -->