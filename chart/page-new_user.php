<?php
/**
 *  Template Name: New User Form
 */
 ?>
 <!DOCTYPE html>
 <html <?php language_attributes(); ?>>
 <head>
 <meta charset="<?php bloginfo( 'charset' ); ?>" />
 <meta name="viewport" content="width=device-width" />
 <meta name=“google-site-verification” content=“tWDhShjXmMU4j_9D6mzK5poOPIj2TVsJVAJKiNR743A” />

 <script src="https://use.typekit.net/ttq4hsd.js"></script>
 <script>try{Typekit.load({ async: true });}catch(e){}</script>

 <title>
 	<?php bloginfo('name'); ?> |
 	<?php is_front_page() ? bloginfo('description') : wp_title(''); ?>
 </title>

 <link rel="profile" href="gmpg.org/xfn/11" />
 <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
 <?php // We are loading our theme directory style.css by queuing scripts in our functions.php file ?>

 <?php wp_head(); ?>
 <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/dist/js/jquery.js"></script>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <script src="https://code.highcharts.com/highcharts.js"></script>
 <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/dist/js/slick.min.js"></script>
 <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/dist/js/jquery.fitvids.js"></script>
 <!-- <script src="maps.google.com/maps/api/js?key=AIzaSyB2Fdgrr4wuzqSylgXdb3z-cMtSOtIDjFg" type="text/javascript"></script> -->
 </head>

 <body class="login login-action-login wp-core-ui  locale-en-us">
 	<!-- Google Tag Manager -->
 	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
 	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
 	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
 	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
 })(window,document,'script','dataLayer','GTM-MXPSTBK');</script>
 <!-- End Google Tag Manager -->

<?php
wp_enqueue_style( 'login' );
	do_action( 'login_enqueue_scripts' );
 ?>
 <div class="login">
	<div class="new-user-form login">
		<a href="/" title="CHART" tabindex="-1"><div></div></a>
		<h2>New User Registration</h2>
		<!-- may not match staging/local but this is the form for the produciton site -->
		<?php echo do_shortcode('[wpforms id="15149" title="false" description="false"]'); ?>
	</div>
</div>
</body>
</html>
