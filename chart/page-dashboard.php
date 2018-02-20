<?php
/**
 *  Template Name: Dashboard Page
 * Template Post Type: member_page
 */
 // CHECK IF CURRENT USER HOSPITAL field match this MEMBER PAGE hospital field
 // SHOW the page if match else
 // Access Denied

if ( !is_user_logged_in() ) {
  $redirect_link = get_the_permalink();
  wp_redirect( '/wp-login.php/?redirect_to='.$redirect_link );
  exit;
}
?>
<?php get_header(); ?>

<section id="profile" class="profile">
    <?php
      $current_user = wp_get_current_user();
      $member_hos_ids = get_field("hospital", 'user_'.$current_user->ID);
      $hos_id = get_field('member')[0];
      $hospital = get_post($hos_id);
      $hos_index = array_search($hos_id, $member_hos_ids);
      ?>
    <?php if (!in_array($hos_id, $member_hos_ids)) : ?>
      <div class="profile-title"><h3 class="container center-text">Access Denied.</h3></div>
      <h4 class="container flex-padding center">Sorry! You are not authorized to access this page.</h4>
    <?php else : ?>
    <div class="flex-container profile-title"><h3><?php echo $hospital->post_title; ?></h3>
      <?php
      $user_info = get_userdata(get_current_user_id());
      $user_roles = $user_info->roles;
      ?>
      <?php include('modules/dashboard_search.php'); ?>
      <?php $roles_array = array('c_suite', 'risk_manager', 'physician', 'educator', 'private_phys_entity'); ?>
    </div>
    <div class="flex-container member-container gray-bg">
      <?php include('member_sidebar.php'); ?>
      <?php setup_postdata( $post );
        $post = get_post( $hospital, OBJECT );
      ?>
      <div class="flex-col flex-3-4 padding-4 member-content">
        <h2>Dashboard Overview</h2>
        <!--  summary insurance coverage -->
        <?php if( user_role_check('c_suite') || user_role_check('risk_manager') || user_role_check('physician') ) : ?>
          <div class="flex-container">
            <div class="flex-col flex-2-3 member-module member-summary margin-right-1 <?php if( !user_role_check('c_suite') &&  !user_role_check('risk_manager') ) { echo 'dash-full-size-override'; } ?>">
              <?php include('modules/dashboard_items/summary_insurance_coverage.php'); ?>
            </div>

            <!--  end of summary insurance coverage -->
            <!--  right side area -->
          <?php if( user_role_check('c_suite') || user_role_check('private_phys_entity') || user_role_check('risk_manager') ) : ?>
            <div class="flex-col flex-1-3 summary-right">
              <!--  member since -->
            <?php if( user_role_check('c_suite') ) : ?>
              <?php include('modules/dashboard_items/member_since.php'); ?>
            <?php endif; ?>
            <!--  end of member since -->
              <?php wp_reset_postdata();?>
              <!--  loss run -->
            <?php if( user_role_check('c_suite') || user_role_check('risk_manager') ) : ?>
              <?php include('modules/dashboard_items/loss_run_snapshot.php'); ?>
            <?php endif; ?>
            <!--  end of loss run -->
            </div>
          <?php endif; ?>
          <!--  end of right side area-->
        </div>
    <?php endif; ?>
        <!--  start growth chart -->
              <?php
              if( user_role_check('c_suite') ) :
                global $post;
                $post = $hospital;
                setup_postdata($post);
                ?>
                <?php include('modules/dashboard_items/growth-chart.php'); ?>
                <?php  wp_reset_postdata();
              endif;
            ?>
        <!--  end of growth chart -->
        <!-- start of simulation usage graph -->
        <?php if( user_role_check('educator') ) : ?>
          <?php
          global $post;
          $post = $hospital;
          setup_postdata($post);
          ?>
          <?php include('modules/dashboard_items/simulation-chart.php'); ?>
          <?php  wp_reset_postdata();?>
        <?php endif;?>
        <!-- end of simulation usage graph -->
          <!--  all three -->
        <?php if( user_role_check('c_suite') || user_role_check('risk_manager') || user_role_check('educator') ) : ?>
        <div class="flex-container no-wrap space-between three-col-margin">

          <!--Participations -->
          <?php // $flex = 'flex-1-3'; ?>
          <?php include('modules/dashboard_items/participation_chart.php'); ?>

          <!-- Upcoming Events -->
          <?php include('modules/dashboard_items/upcoming_events.php'); ?>

          <!--General Offering -->
          <?php include('modules/dashboard_items/announcements.php'); ?>
        </div>
        <?php else : ?>
        <div class="flex-container no-wrap space-between three-col-margin">

          <!-- Upcoming Events -->

          <?php include('modules/dashboard_items/upcoming_events.php'); ?>

          <!--General Offering -->
          <?php include('modules/dashboard_items/announcements.php'); ?>
        </div>
        <?php endif;

        ?>
        <!-- Recent Forum Topics -->
        <?php include('modules/dashboard_items/recent_forum_posts.php'); ?>

        <?php if( user_role_check('risk_manager') ) : ?>
          <?php include('modules/dashboard_items/recent_rm_forum_posts.php'); ?>
        <?php endif; ?>
        <!-- <div class="flex-container"> -->
          <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post();

              include ("modules/modules.php");

            endwhile;

          endif; ?>
        <!-- </div> -->

        <!-- Universal Dashboard -->
      <div class="flex-container space-between">
        <?php include ("modules/universal_dashboard.php"); ?>
      </div>

      <div class="flex-col member-module">
        <div class="member-mod-title">Support Overview</div>
        <div class="flex-container member-block support-dash">
          <?php include('modules/ticketing_nav.php'); ?>
          <?php  echo do_shortcode( ' [wp_support_plus] ' ); ?>
        </div>
      </div>


      <div class="member-module">
        <div class="member-mod-title">My Resources</div>
        <?php include("my_resources.php"); ?>
      </div>


      </div>
    </div>
  <?php endif; ?>
</section>
<?php wp_reset_postdata(); ?>
<?php get_footer();?>
