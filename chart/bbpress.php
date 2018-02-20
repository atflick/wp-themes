<?php
if ( !is_user_logged_in() ) {
  $redirect_link = get_the_permalink();
  wp_redirect( '/wp-login.php/?redirect_to='.$redirect_link );
  exit;
}

get_header();
?>
<section id="member-page" class="profile">
  <div class="flex-container member-container gray-bg">
    <div class="profile-title"><h3><?php the_title(); ?></h3></div>
    <?php
    $hos_index = (isset($_GET['i'])) ? $_GET['i'] : 0;
    $hos_id = get_field('hospital', 'user_'.get_current_user_id())[$hos_index]; ?>
    <?php include("member_sidebar.php"); ?>
    <div class="flex-col flex-3-4 padding-4 member-content">
      <div class="member-module">
        <?php if( bbp_is_single_user() ) : ?>
          <div id="bbp-user-<?php bbp_current_user_id(); ?>" class="bbp-single-user">
            <div class="entry-content">

              <?php bbp_get_template_part( 'content', 'single-user' ); ?>

            </div><!-- .entry-content -->
          </div>
        <?php else : ?>
          <?php if( !is_single(get_queried_object()) ) : ?>
            <?php echo do_shortcode('[bbp-forum-index]'); ?>
          <?php else :
            $object = get_queried_object();
            if($object->ID == 6625 || $object->post_parent == 6625){
              if( !user_role_check('risk_manager') ) {
                ?> <div class="flex-container flex-padding column center-content">
                  <h1> Access Denied </h1>
                  <p> You do not have access to this page. </p>
                  <a href="/"> Back Home </a>
                </div>
                <?php
              } else {
                echo do_shortcode('[bbp-single-topic id=' . $object->ID . ']');
                $forum_id = $object->ID;
                echo do_shortcode('[bbp-single-forum id='. $forum_id .']');
              }
            } else {
              echo do_shortcode('[bbp-single-topic id=' . $object->ID . ']');
              $forum_id = $object->ID;
              echo do_shortcode('[bbp-single-forum id='. $forum_id .']');
            }
          endif; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
<?php
get_footer();
?>
