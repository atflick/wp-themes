<?php
/**
 *  Template Name: Member Events Page
 * Template Post Type: member_page
 */

 if (!is_user_logged_in()) :

 $redirect_link = get_the_permalink();
 wp_redirect( '/wp-login.php/?redirect_to='.$redirect_link );
 exit;
 ?>


 <?php else :
 get_header();

$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

$hos_index = (isset($_GET['i'])) ? $_GET['i'] : 0;
$events_args = array(
  'post_type' => 'event',
  'posts_per_page' => 5,
  'paged' => $paged,
  'meta_key' => 'start_date',
  'orderby' => 'meta_value',
  'order' => 'DESC'
);
$events = new WP_Query($events_args);

?>

<section id="member-events" class="profile">
  <div class="flex-container member-container gray-bg">
    <div class="flex-container profile-title"><h3>Events</h3>
      <?php
      $user_info = get_userdata(get_current_user_id());
      $user_roles = $user_info->roles;
      $hos_id = get_field('hospital', 'user_'.get_current_user_id())[$hos_index];
      ?>
      <?php include('modules/dashboard_search.php'); ?>
    </div>
    <?php include("member_sidebar.php"); ?>
    <div class="flex-col flex-3-4 padding-4 member-content">

      <div class="flex-container list-view news-releases">

        <?php $i=0; while ( $events->have_posts() ) : $events->the_post(); $i++;  $arrow=""; ?>

          <div class="flex-col news-item full-width member-block">
            <?php include ('modules/news_horizontal.php'); ?>
          </div>
        <?php endwhile; ?>


      </div>

      <div class="pager">
        <?php
        $big = 999999999; // need an unlikely integer
        $translated = __( '', 'mytextdomain' ); // Supply translatable string

        echo paginate_links( array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => max( 1, get_query_var('paged') ),
            'total' => $events->max_num_pages,
            'before_page_number' => '<span class="screen-reader-text">'.$translated.' </span>'
        ) );
        ?>

      </div>





  </div>
</section>
<?php wp_reset_query(); ?>

<?php if ( have_posts() ) : ?>
  <?php while ( have_posts() ) : the_post();

    include ("modules/modules.php");

  endwhile;

endif;
endif;

get_footer(); ?>
