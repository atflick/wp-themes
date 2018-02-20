
<?php
$args = array(
  'post_type' => 'member_page',
  'posts_per_page' => 1,
  'name' => 'universal-dashboard'
);
$posts = get_posts($args);
$current_user = wp_get_current_user();
$user_info = get_userdata(get_current_user_id());
$user_roles = $user_info->roles;



if($posts) : ?>
  <?php foreach($posts as $post) : ?>
  <?php setup_postdata($post);

    include ("modules.php");

    endforeach; ?>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
