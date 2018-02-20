<?php
global $post;
$announcement_args = array(
  'post_type' => 'member_page',
  'posts_per_page' => 1,
  'name' => 'universal-dashboard'

);
$announcements = get_posts($announcement_args);

  $post = $announcements[0];
  setup_postdata($post);

  $universal_announcement = get_field('universal_announcements');

  if(strlen($universal_announcement) > 0) {
    $universal_announcement = $universal_announcement;
  } else {
    $universal_announcement = false;
  }

 wp_reset_postdata(); ?>
