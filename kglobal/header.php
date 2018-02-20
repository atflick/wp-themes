<!DOCTYPE html>
<!-- Site designed and developed by nclud [nclud.com] 2017 -->
<html <?php language_attributes(); ?>>
<head>


<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />


<script src="https://use.typekit.net/fuq5efr.js"></script>
<script>try{Typekit.load({ async: true });}catch(e){}</script>

<title>
	<?php bloginfo('name'); ?> |
	<?php is_front_page() ? bloginfo('description') : wp_title(''); ?>
</title>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php // We are loading our theme directory style.css by queuing scripts in our functions.php file ?>

<?php wp_head(); ?>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/dist/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/dist/js/slick.min.js"></script>
<script src="http://maps.google.com/maps/api/js?key=AIzaSyB2Fdgrr4wuzqSylgXdb3z-cMtSOtIDjFg" type="text/javascript"></script>



</head>

<body <?php body_class(); ?> >

	<header id="header" class="header column align-vert-center flex-container">
		<section class="flex-container align-vert-center flex-100">
			<div class="logo flex-15">
				<a href="/"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/logo-kglobal-main.svg" alt=""></a>
			</div>

			<nav class="main flex-container align-vert-center justify-center">
				<?php wp_nav_menu( array( 'menu' => '2', ) ); ?>
			</nav>

			<div class="social-search flex-15 flex-container align-vert-center">
				<a href="https://www.facebook.com/kglobal/" class="nav-social-icon" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/icon-facebook.svg" alt="kglobal Facebook" /></a>
				<a href="https://twitter.com/kglobaldc" class="nav-social-icon" target="_blank"><img class="twitter-icon" src="<?php echo get_template_directory_uri(); ?>/dist/images/icon-twitter.svg" alt="kglobal Twitter" /></a>
				<a href="https://www.linkedin.com/company/kglobal" class="nav-social-icon" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/icon-linkedin.svg" alt="kglobal LinkedIn" /></a>
				<div class="search-input flex-container">
					<div class="search-container"><?php get_search_form(); ?></div>
				</div>
				<div id="search-icon"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/icon-search.svg" data-toggle-src="<?php echo get_template_directory_uri(); ?>/dist/images/icon-close.svg" alt="Search the site" /></div>
			</div>
		</section>

		<div class="mobile-nav-icon">
			<div class="one"></div>
			<div class="two"></div>
			<div class="three"></div>
		</div>

	</header>
