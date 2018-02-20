<?php
/**
 *  Template Name: RM Redirect
 */
if ( !is_user_logged_in() ) {
  $redirect_link = get_the_permalink();
  wp_redirect( '/wp-login.php/?redirect_to='.$redirect_link );
  exit;
} else {
  $current_user = wp_get_current_user();
  $member_hos_ids = get_field("hospital", 'user_'.$current_user->ID);
  $hos_id = get_field('member')[0];
  $args = array(
    'post_type' => 'member_page',
    'post_parent' => 0,
    'meta_query' => array(
      array(
        'key' => 'member',
        'value' => $member_hos_ids[0],
        'compare' => 'LIKE'
      )
    )
  );
  $query = new WP_Query($args);
  if( $query->have_posts() ) :
    while( $query->have_posts() ) : $query->the_post();
      $dash_id = get_the_ID();
    endwhile;
  endif;

  $page_args = array(
    'post_type' => 'member_page',
    'child_of' => $dash_id
  );
  $page_obj = get_pages($page_args);

  foreach ($page_obj as $subpage) {
    $id = $subpage->ID;
    $category = get_the_terms($id, 'member_page_categories');
    if($category[0]->slug == 'risk-management') {
      // var_dump($subpage);
      $url = get_permalink($subpage);
      wp_redirect( $url );
      exit;
    }
  }
}
?>
