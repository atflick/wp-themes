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

<!-- <script src="maps.google.com/maps/api/js?key=AIzaSyB2Fdgrr4wuzqSylgXdb3z-cMtSOtIDjFg" type="text/javascript"></script> -->
</head>

<body <?php body_class(); ?> >
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MXPSTBK');</script>
<!-- End Google Tag Manager -->

<header id="header" class="header">
	<div class="center">
		<div class="flex-container header-nav container">
			<div class="flex-1-4 logo">
				<a href="<?php echo esc_url(home_url( '/' ));?>">
				<img class="chart-logo" id="letter_c" src="<?php echo get_template_directory_uri();?>/dist/images/icons/letter-knockout_c.png" />
				<img class="chart-logo" id="letter_h" src="<?php echo get_template_directory_uri();?>/dist/images/icons/letter-knockout_h.png" />
				<img class="chart-logo" id="needle" src="<?php echo get_template_directory_uri(); ?>/dist/images/icons/letter_needles.png"/>
				<img class="chart-logo" id="letter_r" src="<?php echo get_template_directory_uri();?>/dist/images/icons/letter-knockout_r.png" />
				<img class="chart-logo" id="letter_t" src="<?php echo get_template_directory_uri();?>/dist/images/icons/letter-knockout_t.png" />
					<!-- <svg width="149px" height="51px" viewBox="0 0 149 51">
					    <defs>
					        <polygon id="path-1" points="0.0587662455 50.6692582 23.131981 50.6692582 23.131981 0.154702948 0.0587662455 0.154702948 0.0587662455 50.6692582"></polygon>
					    </defs>
					    <g id="Symbols" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
					        <g id="Page-1">
					            <path d="M0,25.6048472 L0,25.5264176 C0,17.7621624 5.84031588,11.4023619 14.2117491,11.4023619 C19.3511733,11.4023619 22.4271895,13.1191873 24.9583069,15.6162654 L21.1424007,20.0252994 C19.0399946,18.113613 16.8980523,16.9428297 14.1727509,16.9428297 C9.57822563,16.9428297 6.26848917,20.766472 6.26848917,25.4485271 L6.26848917,25.5264176 C6.26848917,30.2090117 9.50049819,34.1108141 14.1727509,34.1108141 C17.2872274,34.1108141 19.1957184,32.8621403 21.3368538,30.9111044 L25.1527599,34.7740963 C22.3494621,37.778406 19.2344477,39.6510124 13.9780289,39.6510124 C5.95704152,39.6510124 0,33.447532 0,25.6048472" id="Fill-1" fill="#FFFFFF"></path>
					            <polygon id="Fill-3" fill="#FFFFFF" points="32.8677056 11.8706483 38.8640143 11.8706483 38.8640143 22.6785627 49.9214818 22.6785627 49.9214818 11.8706483 55.9180594 11.8706483 55.9180594 39.182726 49.9214818 39.182726 49.9214818 28.218761 38.8640143 28.218761 38.8640143 39.182726 32.8677056 39.182726"></polygon>
					            <path d="M107.426257,25.1367495 C110.346549,25.1367495 112.020513,23.5759746 112.020513,21.2737576 L112.020513,21.1958671 C112.020513,18.6203594 110.229823,17.2937951 107.309262,17.2937951 L101.35249,17.2937951 L101.35249,25.1367495 L107.426257,25.1367495 Z M95.3559119,11.8705674 L107.815432,11.8705674 C111.280892,11.8705674 113.967464,12.8456811 115.758692,14.6409361 C117.276932,16.1626309 118.094818,18.3085279 118.094818,20.883766 L118.094818,20.9616565 C118.094818,25.3706905 115.719694,28.1407896 112.254233,29.4285434 L118.912704,39.1829147 L111.903518,39.1829147 L106.06374,30.4427372 L101.35249,30.4427372 L101.35249,39.1829147 L95.3559119,39.1829147 L95.3559119,11.8705674 Z" id="Fill-5" fill="#FFFFFF"></path>
					            <polygon id="Fill-7" fill="#FFFFFF" points="134.502542 17.4110082 126.209105 17.4110082 126.209105 11.8705405 148.792019 11.8705405 148.792019 17.4110082 140.498851 17.4110082 140.498851 39.1828877 134.502542 39.1828877"></polygon>
					            <g id="Group-11" transform="translate(63.472924, 0.114814)">
					                <mask id="mask-2" fill="white">
					                    <use xlink:href="#path-1"></use>
					                </mask>
					                <g id="Clip-10"></g>
					                <path d="M4.93623014,22.629834 L18.2878673,9.17957162 L18.1256886,28.1401158 L4.93623014,22.629834 Z M22.9308042,1.3988758 C22.9232735,0.29951461 21.6056724,-0.255691092 20.816833,0.507581989 L0.0587662455,20.592283 L0.259943141,49.425247 C0.26774278,50.5243387 1.58480596,51.0795444 2.37418321,50.3162713 L23.131981,30.2315703 L22.9308042,1.3988758 Z" id="Fill-9" fill="#068B84" mask="url(#mask-2)"></path>
					            </g>
					            <path d="M68.3868312,22.7671531 L81.7384684,9.3168907 L81.5762897,28.2774349 L86.5825821,30.3688894 L86.3814052,1.53592536 C86.3736056,0.43683369 85.0562735,-0.118372012 84.2671652,0.644901069 L63.5093673,20.7296021 L68.3868312,22.7671531 Z" id="Fill-12" fill="#379E99"></path>
					        </g>
					    </g>
					</svg> -->
				</a>
			</div>
			<div class="flex-3-4 main-menu">
				<nav class="site-navigation main-navigation flex-container">
					<?php if ( !is_user_logged_in() ) { ?>
						<a class="member-login" href="/wp-login.php">Member Login</a>
					<?php } else {
						$current_user = wp_get_current_user();
						$user_hospitals = get_field('hospital', 'user_' . $current_user->ID);
						$num_hospitals = count($user_hospitals);
						$multiple_hospitals = ($user_hospitals) ? $num_hospitals > 1 : false;
						if (!$multiple_hospitals) {
							if($user_hospitals == !null) {
								$args = array(
									'post_type' => 'member_page',
									'posts_per_page' => -1,
									'post_parent' => 0,
									'meta_query' => array(
										array(
											'key' => 'member',
											'value' => $user_hospitals[0],
											'compare' => 'LIKE'
										)
									),
								);
								$query = new WP_Query($args);
								if($query->have_posts() ) :
									while( $query->have_posts() ) : $query->the_post(); ?>
										<a class="member-login logged-in" href="<?php the_permalink();?>"><span>Welcome <?php echo $current_user->first_name; ?></span></a>
									<?php endwhile; ?>
									<?php wp_reset_postdata(); ?>
								<?php endif;
							// user has more than one hospital, creating dropdown with all hospital names/links
						} else { ?>
							<a class="member-login logged-in" href="<?php echo wp_logout_url( home_url() ); ?>">Logout</a>
						<?php }
						} elseif ($multiple_hospitals) {

							echo '<div class="multiple-hospital-nav hide">';
							$i = 0;
							foreach ($user_hospitals as $hos) {
								$args = array(
									'post_type' => 'member_page',
									'posts_per_page' => -1,
									'post_parent' => 0,
									'meta_query' => array(
										array(
											'key' => 'member',
											'value' => get_field('hospital', 'user_' . $current_user->ID)[$i],
											'compare' => 'LIKE'
										)
									),
								);
								$query = new WP_Query($args);
								if($query->have_posts() ) :
									while( $query->have_posts() ) : $query->the_post(); ?>
										<a class="" href="<?php the_permalink();?>"><span><?php the_title(); ?></span></a>
									<?php endwhile; ?>
									<?php wp_reset_postdata(); ?>
								<?php endif;
								$i++;
							}

							echo '</div>';
							echo '<a class="member-login logged-in" id="user-multiple-hospitals" href="#">'.'<span>Welcome '.$current_user->first_name.'</span></a>';
						}
				 	} ?>
					<?php wp_nav_menu( array( 'menu_id' => '50', ) ); // Display the user-defined menu in Appearance > Menus ?>
				</nav><!-- .site-navigation .main-navigation -->
			</div>

		</div>
	</div>
	<a id="pull"></a>
</header>

<main class="main-fluid"><!-- start the page containter -->

	<!-- Page hero -->
	<?php $hero = false;

		if( have_rows('module') ):

			while( have_rows('module') ): the_row();

				$type = get_sub_field('module_type');
				if ($type == "hero"){
					$hero = true;
					include ('modules/hero.php');
				}

			endwhile;

		endif;

		// default hero
		if (!$hero){
			if (get_the_post_thumbnail_url())
					$hero = get_the_post_thumbnail_url();
			else
					$hero = get_template_directory_uri().'/dist/images/default_hero.jpg';
			if (isset($post->post_type)) if ($post->post_type == "member")
					$hero = get_template_directory_uri().'/dist/images/member_hero.jpg'; ?>

			<section id="hero" class="hero-banner default-hero">
			</section>

		<?php } ?>
