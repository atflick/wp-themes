<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<!-- site verification done in AIOSEO -->

<script>try{Typekit.load({ async: true });}catch(e){}</script>

<title>
	<?php bloginfo('name'); ?> |
	<?php is_front_page() ? bloginfo('description') : wp_title(''); ?>
</title>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php // We are loading our theme directory style.css by queuing scripts in our functions.php file ?>

<?php wp_head(); ?>
<link href="https://fonts.googleapis.com/css?family=Merriweather:400,700" rel="stylesheet">
<script type="text/javascript" src="//fast.fonts.net/jsapi/59403e5b-4c2b-4e9b-8cad-128682863992.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/dist/js/jquery.js"></script>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-W9RVQ6Q');</script>
<!-- End Google Tag Manager -->
</head>

<body <?php body_class(); ?> >
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W9RVQ6Q"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

	<header id="header" class="header align-vert-center flex-container">
		<a class="flex-container animate-fade-in justify-center align-vert-center" href="<?php echo get_home_url(); ?>"><img class="animate-fade-in logo" src="<?php echo get_template_directory_uri(); ?>/dist/images/logo-newest.png"></a>
		<div class="flex-container nav-links align-vert-center">
			<?php wp_nav_menu(array('theme_location' => 'primary') ); ?>
		</div>
		<div class="get-updates flex-container center-center">
			<div id="get-updates-button" class="updates-button">Get Updates</div>
			<div class="search-container flex-container center-center">
				<img class="hide" src="<?php echo get_template_directory_uri();?>/dist/images/close.svg"/>
				<div class="search-open" style="background:url(<?php echo get_template_directory_uri(); ?>/dist/images/icon-search.svg) no-repeat center center; background-size: cover;"></div>
				<p> Search </p>
			</div>
		</div>
	</header>
	<div class="flex-container search-form hide-search"><?php get_search_form(); ?></div>
