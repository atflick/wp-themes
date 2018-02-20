<div class="flex-container member-container gray-bg">
  <?php include(dirname(__FILE__)."/../member_sidebar.php"); ?>

<?php setup_postdata( $post );
  $post = get_post( $hospital, OBJECT );
?>
  <div class="flex-col flex-3-4 padding-4 member-content">
    <h2>Dashboard Overview</h2>
    <div class="flex-container">
      <div class="flex-col flex-2-3 member-module member-summary margin-right-1">
        <div class="member-mod-title"><?php echo $hospital->post_title; ?></div>
          <?php include('dashboard_items/summary_insurance_coverage.php'); ?>
        </div>

      <div class="flex-col flex-1-3 summary-right">
        <?php include('dashboard_items/member_since.php'); ?>

        <?php wp_reset_postdata();?>

        <?php include('dashboard_items/loss_run_snapshot.php'); ?>
      </div>
  </div>
  <?php
  global $post;
  $post = $hospital;
  setup_postdata($post);
  ?>
  <?php include('dashboard_items/growth-chart.php'); ?>

    <div class="projections-module">
      <?php include('dashboard_items/projections-chart.php'); ?>
    </div>
    <?php  wp_reset_postdata();?>

    <div class="flex-container">
<!--  if not physician otherwise half width -->
      <div class="member-module flex-col flex-1-3">
        <div class="member-mod-title">Participation</div>

      </div>



      <div class="member-module flex-col flex-1-3">
        <div class="member-mod-title">Upcoming Events</div>

      </div>

      <div class="member-module flex-col flex-1-3 ">
        <div class="member-mod-title">Offering / Announcements</div>

      </div>


    </div>

    <div class="flex-container">

      <!--Participations -->
      <?php include('dashboard_items/participation_chart.php'); ?>

      <!-- Upcoming Events -->

      <?php include('dashboard_items/upcoming_events.php'); ?>

    <!--General Offering -->
    <?php include('dashboard_items/announcements.php'); ?>
    </div>

      <!-- <div class="flex-container"> -->
        <?php if ( have_posts() ) : ?>
          <?php while ( have_posts() ) : the_post();

            include ("modules.php");

          endwhile;

        endif; ?>
      <!-- </div> -->

      <!-- Universal Dashboard -->
    <div class="flex-container space-between">
      <?php include ("universal_dashboard.php"); ?>
    </div>

    <div class="flex-col member-module">
      <div class="member-mod-title">Support Overview</div>
      <div class="flex-container member-block">
        <?php echo do_shortcode( ' [wp_support_plus] ' ); ?>
      </div>
    </div>

    <div class="member-module">
      <div class="member-mod-title">My Resources</div>
      <?php include(dirname(__FILE__)."/../my_resources.php"); ?>
    </div>

    <?php include('newsletter_signup.php'); ?>

  </div>
</div>
