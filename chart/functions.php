<?php

// Define the version so we can easily replace it throughout the theme
define( 'SKELETON_VERSION', 1.0 );


$current_user = wp_get_current_user();
$user_roles = $current_user->roles;
if (in_array('administrator', $user_roles) || in_array('wp_support_plus_supervisor', $user_roles) || in_array('wp_support_plus_agent', $user_roles)) {
	show_admin_bar(true);
} else {
	show_admin_bar(false);
}


/*  Set the maximum allowed width for any content in the theme */
if ( ! isset( $content_width ) ) $content_width = 900;

/* Add Rss feed support to Head section */
add_theme_support( 'automatic-feed-links' );

add_theme_support('post-thumbnails');
add_theme_support('post-tags');

/* Register main menu for Wordpress use */
register_nav_menus(
	array(
		'primary'	=>	__( 'Primary Menu', '' ), // Register the Primary menu
		// Copy and paste the line above right here if you want to make another menu,
		// just change the 'primary' to another name
	)
);


/* Activate sidebar for Wordpress use */
function skeleton_register_sidebars() {
	register_sidebar(array(				// Start a series of sidebars to register
		'id' => 'sidebar', 					// Make an ID
		'name' => 'Sidebar',				// Name it
		'description' => 'Take it on the side...', // Dumb description for the admin side
		'before_widget' => '<div>',	// What to display before each widget
		'after_widget' => '</div>',	// What to display following each widget
		'before_title' => '<h3 class="side-title">',	// What to display before each widget's title
		'after_title' => '</h3>',		// What to display following each widget's title
		'empty_title'=> '',					// What to display in the case of no title defined for a widget
		// Copy and paste the lines above right here if you want to make another sidebar,
		// just change the values of id and name to another word/name
	));
}

// adding sidebars to Wordpress (these are created in functions.php)
add_action( 'widgets_init', 'skeleton_register_sidebars' );

/* Enqueue Styles and Scripts */

function skeleton_scripts()  {

	// get the theme directory style.css and link to it in the header
	wp_enqueue_style('style.css', get_stylesheet_directory_uri() . '/dist/css/style.min.css?r=5&counter=<?php echo time(); ?>');

	// add theme scripts
	// wp_enqueue_script( 'jquery', get_template_directory_uri() . 'dist/js/jquery.js', array(), SKELETON_VERSION, true );
	wp_enqueue_script( 'slick', get_template_directory_uri() . '/dist/js/slick.min.js', array(), SKELETON_VERSION, true );
	wp_enqueue_script( 'fitvids', get_template_directory_uri() . '/dist/js/jquery.fitvids.js', array(), SKELETON_VERSION, true );
	wp_enqueue_script( 'skeleton', get_template_directory_uri() . '/js/scripts.js', array(), SKELETON_VERSION, true );

}
add_action( 'wp_enqueue_scripts', 'skeleton_scripts' ); // Register this fxn and allow Wordpress to call it automatcally in the header


function excerpt($num) {
    $limit = $num+1;
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt)."... (<a href='" .get_permalink($post->ID) ." '>Read more</a>)";
    echo $excerpt;
}
function template_chooser($template)
{
  global $wp_query;
  $post_type = get_query_var('post_type');
  if( $wp_query->is_search )
  {
    return locate_template('search.php');  //  redirect to archive-search.php
  }
  return $template;
}
add_filter('template_include', 'template_chooser');


function add_acf_columns ( $columns ) {
   return array_merge ( $columns, array (
     'case_number' => __( 'Case Number' ),
		 'policy_holder' => __( 'Policy Holder' ),
		 'insured' => __( 'Insured' ),
		 'claimant_name' => __( 'Claimant Name' ),
		 'description_of_loss' => __( 'Description of Loss' ),
		 'claim_type' => __( 'Claim Type' ),
   ) );
 }
 add_filter ( 'manage_claim_posts_columns', 'add_acf_columns' );

function claim_custom_column ( $column, $post_id ) {
   switch ( $column ) {

    case 'case_number':
       echo get_post_meta ( $post_id, 'case_number', true );
       break;
		case 'policy_holder':
	 			$holder = get_post_meta ( $post_id, 'policy_holder', true );
				echo get_post($holder[0])->post_title;
	 			break;
		case 'insured':
			 	echo get_post_meta ( $post_id, 'insured', true );
		break;
		case 'claimant_name':
			 	echo get_post_meta ( $post_id, 'claimant_name', true );
		break;
		case 'description_of_loss':
			 	echo get_post_meta ( $post_id, 'description_of_loss', true );
		break;
		case 'claim_type':
			 	echo get_post_meta ( $post_id, 'claim_type', true );
		break;



   }
 }
 add_action ( 'manage_claim_posts_custom_column', 'claim_custom_column', 10, 2 );


 function my_acf_upload_prefilter( $errors, $file, $field ) {

    // only allow admin
    if( !current_user_can('manage_options') ) {

        // this returns value to the wp uploader UI
        // if you remove the ! you can see the returned values
        $errors[] = 'test prefilter';
        $errors[] = print_r($_FILES,true);
        $errors[] = $_FILES['async-upload']['name'] ;

    }
    //this filter changes directory just for item being uploaded
    add_filter('upload_dir', 'my_upload_directory');

    // return
    return $errors;

}
add_filter('acf/upload_prefilter/name=file', 'my_acf_upload_prefilter');

function my_upload_directory( $param ){
    $mydir = '/protected';

    $param['path'] = $param['basedir'] . $mydir;
    $param['url'] = $param['baseurl'] . $mydir;

	// if you need a different location you can try one of these values
/*
    error_log("path={$param['path']}");
    error_log("url={$param['url']}");
    error_log("subdir={$param['subdir']}");
    error_log("basedir={$param['basedir']}");
    error_log("baseurl={$param['baseurl']}");
    error_log("error={$param['error']}");
*/

    return $param;
}

function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return 'CHART';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );

function my_login_stylesheet() {
    wp_enqueue_style( 'custom-login', '/wp-content/themes/chart/dist/css/style.min.css' );
    wp_enqueue_script( 'jquery', '/wp-content/themes/chart/dist/js/jquery.js');
    wp_enqueue_script( 'custom-login', '/wp-content/themes/chart/dist/js/login-scripts.js');
}
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );

@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );


function chart_login_redirect($redirect_to, $request, $user) {
	if($redirect_to != get_home_url()) {
		return $redirect_to;
	} elseif ( isset( $user->roles )) {
		$redirect_user_hospitals = get_field('hospital', 'user_'.$user->ID);
		$redirect_args = array(
			'post_type' => 'member_page',
			'posts_per_page' => -1,
			'post_parent' => 0,
			'meta_query' => array(
				array(
					'key' => 'member',
					'value' => $redirect_user_hospitals[0],
					'compare' => 'LIKE'
				)
			),
		);
		$query = new WP_Query($redirect_args);
		if($query->have_posts() ) :
			while( $query->have_posts() ) : $query->the_post();
			$login_homepage = get_the_permalink();
		endwhile;
		wp_reset_postdata();
		// $login_homepage = ($go_url) ? $go_url : $login_homepage;
		return $login_homepage;
	endif;
	}
}

add_filter('login_redirect', 'chart_login_redirect', 10, 3 );

function get_posts_children($parent_id, $post_type){
    $children = array();
    // grab the posts children
    $posts = get_posts( array( 'numberposts' => -1, 'post_status' => 'publish', 'post_type' => $post_type, 'post_parent' => $parent_id, 'suppress_filters' => false ));
		// now grab the grand children
    foreach( $posts as $child ){
        // recursion!! hurrah
        $gchildren = get_posts_children($child->ID, $post_type);
        // merge the grand children into the children array
        if( !empty($gchildren) ) {
            $children = array_merge($children, $gchildren);
        }
    }
    // merge in the direct descendants we found earlier
    $children = array_merge($children,$posts);
    return $children;
}

function user_role_check($role){
	$user_info = get_userdata(get_current_user_id());
	$user_roles = $user_info->roles;
	return in_array($role, $user_roles);
}

add_filter('upload_mimes', 'custom_upload_mimes');
function custom_upload_mimes ( $existing_mimes=array() ) {
// add your extension to the array
$existing_mimes['sce'] = 'application/active-video-mime';
$existing_mimes['scx'] = 'application/active-video-mime';
return $existing_mimes;
}
// courtesy of http://thestizmedia.com/acf-pro-simple-local-avatars/
add_filter('get_avatar', 'tsm_acf_profile_avatar', 10, 5);
function tsm_acf_profile_avatar( $avatar, $id_or_email, $size, $default, $alt ) {
    $user = '';

    // Get user by id or email
    if ( is_numeric( $id_or_email ) ) {
        $id   = (int) $id_or_email;
        $user = get_user_by( 'id' , $id );
    } elseif ( is_object( $id_or_email ) ) {
        if ( ! empty( $id_or_email->user_id ) ) {
            $id   = (int) $id_or_email->user_id;
            $user = get_user_by( 'id' , $id );
        }
    } else {
        $user = get_user_by( 'email', $id_or_email );
    }
    if ( ! $user ) {
        return $avatar;
    }
    // Get the user id
    $user_id = $user->ID;
    // Get the file id
    $image_id = get_user_meta($user_id, 'image', true); // CHANGE TO YOUR FIELD NAME
    // Bail if we don't have a local avatar
    if ( ! $image_id ) {
        return $avatar;
    }
    // Get the file size
    $image_url  = wp_get_attachment_image_src( $image_id, 'thumbnail' ); // Set image size by name
    // Get the file url
    $avatar_url = $image_url[0];
    // Get the img markup
    $avatar = '<img alt="' . $alt . '" src="' . $avatar_url . '" class="avatar avatar-' . $size . '" height="' . $size . '" width="' . $size . '"/>';
    // Return our new avatar
    return $avatar;
}

add_filter( 'upload_dir', 'post_type_upload_dir' );

function post_type_upload_dir( $args ) {

  $id = ( isset( $_REQUEST['post_id'] ) ? $_REQUEST['post_id'] : '' );

  if( $id ) {

		 if(get_post_type( $id ) === 'event' || get_post_type( $id ) === 'member_posts') {
			$newdir = '/protected';

			$args['path'] = $args['basedir'] . $newdir;
	    $args['url'] = $args['baseurl'] . $newdir;

		 }
  }
	return $args;
}

// makes all links in the_content open in a new window for certain post types
// this was requested by the client September 2017
function open_links_in_new_tab($content){

	$post_type = get_post_type();

	if($post_type === 'event' || $post_type === 'member_posts') {
		$pattern = '/<a(.*?)?href=[\'"]?[\'"]?(.*?)?>/i';
		$content = preg_replace_callback($pattern, function($m){
			$tpl = array_shift($m);
			$hrf = isset($m[1]) ? $m[1] : null;

			if ( preg_match('/target=[\'"]?(.*?)[\'"]?/i', $tpl) ) {
				return $tpl;
			}

			if ( trim($hrf) && 0 === strpos($hrf, '#') ) {
				return $tpl; // anchor links
			}

			return preg_replace_callback('/href=/i', function($m2){
				return sprintf('target="_blank" %s', array_shift($m2));
			}, $tpl);

		}, $content);
	}
	return $content;
}

add_filter('the_content', 'open_links_in_new_tab', 999);
