<?php
/**
* The template for displaying any single Member Page.
*
*/


$user_hos = get_field('hospital', 'user_'.get_current_user_id());
$hos_id = get_field('member')[0];

if( !is_user_logged_in() ) :
  $redirect_link = get_the_permalink();
  wp_redirect( '/wp-login.php/?redirect_to='.$redirect_link );
  exit;

  else :
    get_header();
    ?>
    <?php

    $term = get_the_terms(get_queried_object(), 'member_page_categories')[0];
    ?>
    <section id="member-page" class="profile">
      <?php
      $current_user = wp_get_current_user();
      $member_hos_ids = get_field("hospital", 'user_'.$current_user->ID);
      $hos_index = (isset($_GET['i'])) ? $_GET['i'] : 0;
      $hos_id = get_field('hospital', 'user_'.$current_user->ID)[$hos_index];

      $hospital = get_post($hos_id);

      ?>

      <div class="flex-container member-container gray-bg">
        <div class="flex-container profile-title"><h3><?php $obj = get_post_type_object(get_post_type()); echo $obj->labels->singular_name;  ?></h3>
          <?php
          $user_info = get_userdata(get_current_user_id());
          $user_roles = $user_info->roles;
          ?>
          <?php include('modules/dashboard_search.php'); ?>
        </div>

        <?php include("member_sidebar.php"); ?>
        <div class="flex-col flex-3-4 padding-4 member-content">

          <?php if ( have_posts() ) : ?>

            <?php while ( have_posts() ) : the_post(); $class=""; ?>


              <article class="post">

                <h1><?php the_title();?></h1>

                <div class="the-content">

                  <?php the_content(); ?>

                </div>

              </article>

            <?php endwhile; ?>
          <?php endif; ?>
        </div>
      </div>
    </section>

  <?php endif; ?>
  <?php get_footer(); ?>
