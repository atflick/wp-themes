<?php
// Template Name: Ajax Sort

header('Content-Type: text/html');

$direction = isset($_POST['direction']) ? htmlspecialchars($_POST['direction']) : "";
$offset_amount = isset($_POST['offset_amount']) ? htmlspecialchars($_POST['offset_amount']) : "";
// attaching post data to variables
if(isset($_POST['data']) && !empty($_POST['data'])) {
  
  function filter(&$value){
    $value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
  }

  $data = array();
  parse_str($_POST['data'], $data);
  array_walk_recursive($data, 'filter');
  $locale = isset($data['locale']) ? $data['locale'] : "all";
  $audience = isset($data['audience']) ? $data['audience'] : "";
  $post_type = isset($data['post_type']) ? $data['post_type'] : "";
  $posts_per_page = isset($data['posts_per_page']) ? $data['posts_per_page'] : "";
  $category_name = isset($data['category_name']) ? $data['category_name'] : "";
  $news_type = isset($data['news_type']) ? $data['news_type'] : "";
  $include = isset($data['include']) ? $data['include'] : "";
  
  $selection = "";
// form basic query
  $args = array(
    'post_type' => $post_type,
  );



if($post_type == 'resource') {
  // if this is resource post type create an array with the current taxonomies selected
    $taxonomies = array(
      'locale' => $locale,
      'audience' => $audience
    );
    if($category_name == 'all'){
      $args['category_name'] = 'educational_resources, disposal';
        $args['orderby'] = 'date';
        $args['order'] = 'DESC';
    } else {
      $args['category_name'] = $category_name;
      if($category_name === 'disposal') {
        $args['orderby'] = 'meta_value';
        $args['meta_key'] = 'state';
        $args['order'] = 'ASC';
      } elseif($category_name === 'educational_resources'){
        $args['order'] = 'DESC';
        $args['orderby'] = 'date';
      }
    }
    if($locale || $audience ) {
      $args['tax_query'] = array(
        'relation' => 'AND'
      );
      foreach($taxonomies as $taxonomy => $term){
        if($term && $term !== 'all') {
          $args['tax_query'][] = array(
            'taxonomy' => $taxonomy,
            'field' => 'slug',
            'terms' => $term,
          );
        }
      }
    }
  } elseif($post_type == 'post') {
    if($news_type!=='all'): 
      $args['tax_query'] = array(
        array(
         'taxonomy' => 'news_type',
          'field' => 'slug',
          'terms' => $news_type
          )
        );
    endif;
  }
}

$query = new WP_Query($args);
$all_possible_posts = $query->post_count;

// check if the action was to paginate, if so determine where in the pagination tree it is
if( $direction == 'next' ) {
  $new_amount = (int)$offset_amount + (int)$posts_per_page;
  $args['offset'] = $new_amount;
} elseif( $direction == 'previous' ) {
  $new_amount = (int)$offset_amount - (int)$posts_per_page;
  $args['offset'] = $new_amount;
} else {
  $new_amount = 0;
}

$args['posts_per_page'] = $posts_per_page;
$query = new WP_Query($args);
include('modules/components/post_listing.php');
