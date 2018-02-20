<?php

// Define the version so we can easily replace it throughout the theme
define( 'ALLIED_AGAINST', 1.0 );


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
		'footer' => __('Footer Menu', '')
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
	wp_enqueue_script( 'skeleton', get_template_directory_uri() . '/dist/js/scripts.js', array(), ALLIED_AGAINST, true );

}
add_action( 'wp_enqueue_scripts', 'skeleton_scripts' ); // Register this fxn and allow Wordpress to call it automatcally in the header


function excerpt($num) {
    $limit = $num+1;
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    array_pop($excerpt);
    // $excerpt = implode(" ",$excerpt)."... (<a href='" .get_permalink($post->ID) ." '>Read more</a>)";
    $excerpt = implode(" ",$excerpt)."...";
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

function change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'News';
    $submenu['edit.php'][5][0] = 'News';
    $submenu['edit.php'][10][0] = 'Add News';
    $submenu['edit.php'][16][0] = 'News Tags';
}
function change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'News';
    $labels->singular_name = 'News';
    $labels->add_new = 'Add News';
    $labels->add_new_item = 'Add News';
    $labels->edit_item = 'Edit News';
    $labels->new_item = 'News';
    $labels->view_item = 'View News';
    $labels->search_items = 'Search News';
    $labels->not_found = 'No News found';
    $labels->not_found_in_trash = 'No News found in Trash';
    $labels->all_items = 'All News';
    $labels->menu_name = 'News';
    $labels->name_admin_bar = 'News';
    // removing categories from news post type
		global $wp_taxonomies;
		unset($wp_taxonomies['category']->object_type[0]);
}

add_action( 'admin_menu', 'change_post_label' );
add_action( 'init', 'change_post_object' );

function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

function searchfilter($query) {

    if ($query->is_search && !is_admin() ) {
        if(!isset($_GET['sort']))
        {
            $query->set('post_type',array('post','resource'));
        } 
        else
        {   
            $sort = htmlspecialchars($_GET['sort']);
            switch ($sort) {
                case 'most-recent':
                    $query->set('orderby', 'date');
                    $query->set('post_type',array('post','resource'));
                    break;
                
                case 'resources':
                    $query->set('post_type', array('resource'));
                    break;
                
                default:
                    $query->set('post_type', array('post'));
                    $query->set('tax_query', array(
                            array(
                                'taxonomy' => 'news_type',
                                'field' => 'slug',
                                'terms' => $sort
                            )
                        )
                            );
                    break;                
            }
        }
    }

return $query;
}

add_filter('pre_get_posts','searchfilter');

if( function_exists('acf_add_options_page') ) {
	
    acf_add_options_page();
    acf_add_options_sub_page('Search');
	
}

// function update_my_metadata(){
//     $args = array(
//         'post_type' => 'resource',
//         'posts_per_page'   => -1,
//         'category_name' => 'disposal'
//     );
//     $posts = get_posts($args);
//     foreach ( $posts as $post ) {
//         // Run a loop and update every meta data
//         $terms = get_the_terms( $post->ID, 'locale');
//         foreach($terms as $term){
//             $state_name = $term->name;
//         }
//         update_post_meta( $post->ID, 'state', $state_name );
//     }
// }
// // Hook into init action and run our function
// add_action('init','update_my_metadata');