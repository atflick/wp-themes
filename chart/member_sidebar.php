<?php
$args = array(
  'post_type' => 'member_page',
  'post_parent' => 0,
  'meta_query' => array(
    array(
      'key' => 'member',
      'value' => $hos_id,
      'compare' => 'LIKE'
    )
  )
);
$query = new WP_Query($args);
$id_array = array();
if( $query->have_posts() ) :
  while( $query->have_posts() ) : $query->the_post();
$id_array[] = get_the_ID();
  endwhile;
endif;
wp_reset_postdata();

$page_args = array(
  'post_type' => 'member_page',
  'child_of' => $id_array[0]
);
$page_obj = get_pages($page_args);
$pso_id = '';
$simulations_id = '';
$membership_info_id = '';
$insurance_id = '';
$financial_id = '';
$hos_index = (isset($_GET['i'])) ? $_GET['i'] : 0;
foreach ($page_obj as $subpage) {
  $id = $subpage->ID;
  $category = get_the_terms($id, 'member_page_categories');
  switch ($category[0]->slug) {
    case 'pso':
      $pso_id = $id;
      break;
    case 'simulation':
      $simulation_id = $id;
      break;
    case 'membership-info':
      $membership_info_id = $id;
      break;
    case 'insurance':
      $insurance_id = $id;
      break;
    case 'claims':
      $claims_id = $id;
      break;
    case 'underwriting':
      $uw_id = $id;
      break;
    case 'financial':
      $financial_id = $id;
      break;
    default:
      break;
  }
}

$nav_excludes = array();
$user_roles = $current_user->roles;

  if(in_array('c_suite', $user_roles)) {
    $nav_excludes = array();
  } else {
    array_push($nav_excludes, $membership_info_id);
    if(!in_array('pso', $user_roles)){
      array_push($nav_excludes, $pso_id);
    }
    if(!in_array('educator', $user_roles)) {
      // array_push($nav_excludes, $simulation_id);
    }
    if(!in_array('risk_manager', $user_roles) && !in_array('physician', $user_roles)) {
      array_push($nav_excludes, $financial_id, $claims_id, $uw_id);
    }
    if(!in_array('risk_manager', $user_roles) && !in_array('physician', $user_roles) && !in_array('private_phys_entity', $user_roles)) {
      array_push($nav_excludes, $insurance_id);
    }
  }

  $list_args = array(
    'post_type' => 'member_page',
    'child_of' => $id_array[0],
    'title_li' => "",
    'exclude' => implode(", ", $nav_excludes)
  );

  $user_hospitals = get_field('hospital', 'user_' . $current_user->ID);
  $multiple_hospitals = count($user_hospitals) > 1;
  $hos_slug = ($multiple_hospitals) ? "?i=".$hos_index : "";

 ?>
  <div class="flex-col flex-1-4 member-sidebar">
    <div class="user-info">
      <div class="profile-picture"><?php echo get_avatar($current_user->ID); ?></div>
      <h5 class="author-name"> <?php echo $current_user->first_name; ?>  <?php echo $current_user->last_name; ?> </h5>
      <div class="job-title"><?php the_field("job_title",'user_'.$current_user->ID); ?></div>
      <div class="job-title"><?php the_field("phone_number",'user_'.$current_user->ID); ?></div>
      <div class="edit-profile"><a href="/edit-profile<?php echo $hos_slug?>">Edit Profile</a></div>
      <a class="logout" href="<?php echo wp_logout_url( home_url() ); ?>">Logout</a>

    </div>


    <div id="member-pages" class="member-pages" data-hosname="<?php echo get_the_title($hos_id); ?>">
      <li class="page_item">
        <a href="<?php echo get_permalink($id_array[0]); ?>">Dashboard Overview</a>
      </li>
      <?php
      wp_list_pages($list_args);
      ?>
      <li class="page_item"><a href="/member_page/my-resources<?php echo $hos_slug?>">My Resources</a></li>
      <li class="page_item"><a href="/member_page/events<?php echo $hos_slug?>">Events</a></li>
      <li class="page_item"><a href="/support<?php echo $hos_slug?>">Member Services</a></li>
      <li class="page_item"><a href="/forums<?php echo $hos_slug?>">Forums</a></li>

    </div>
  </div>
