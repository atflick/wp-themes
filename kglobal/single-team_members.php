<?php
/**
 * The template for displaying any single Team Member
 *
 */

get_header(); ?>
<main class="team-member">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

  <section class="nav-padding hero hero-bottom-slant flex-container">
    <div class="headshot flex-45 flex-col">
      <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
    </div>

    <div class="info flex-55 flex-col">
      <h1><?php the_field('first_name'); ?> <?php the_field('last_name'); ?></h1>
      <h5 class="title"><?php the_field('title'); ?></h5>
      <h5 class="email"><a href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a></h5>
      <h5><?php the_field('phone'); ?></h5>
      <?php if(get_field('linkedin_url')) {?>
      <a href="<?php the_field('linkedin_url'); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/icon-linkedin.svg" alt="<?php the_field('first_name'); ?>'s LinkedIn" /></a>
      <?php } ?>
      
      <?php if(get_field('twitter_url')) {?>
      <a href="<?php the_field('twitter_url'); ?>" target="_blank"><img class="twitter-icon" src="<?php echo get_template_directory_uri(); ?>/dist/images/icon-twitter.svg" alt="<?php the_field('first_name'); ?>'s Twitter" /></a>
      <?php } ?>
    </div>
  </section>

  <section class="side-padding about">
    <h2>About <?php the_field('first_name'); ?></h2>
    <p><?php the_content();?></p>
  </section>

  <?php
  // grabbing recent posts
  $post_type = 'post';
  $post_amount = 2;
  $team_member_id = get_the_ID();
  $cat = (isset($_GET['cat'])) ? $_GET['cat'] : '';
  // need this to search through repeater fields for author post object

  function allow_wildcards( $where ) {
    global $wpdb;
    $where = str_replace(
      "meta_key = 'authors_%",
      "meta_key LIKE 'authors_%",
      $wpdb->remove_placeholder_escape($where)
    );
    return $where;
  }
  add_filter('posts_where', 'allow_wildcards');

  $args = array(
    'post_type' => $post_type,
    'posts_per_page' => $post_amount,
    'meta_query' => array(
      array(
        'key' => 'authors_%_author',
        'compare'	=> '=',
        'value' => $team_member_id,
      )
    )
  );

  $query = new WP_Query($args);
  $total_posts = $query->found_posts;

  ?>

  <?php if($query->have_posts()) : ?>
  <section class="latest-posts cream-offset-bg">
    <h2>Latest Posts</h2>
    <div class="flex-container logo-bg">

      <?php
      while($query->have_posts() ) : $query->the_post();
      ?>
      <?php
      // template for post card that can be used elsewhere
      include('modules/components/post_card.php'); ?>

      <?php endwhile; ?>

    </div>
    <?php  if($total_posts > 2) { ?>
    <div class="flex-container justify-center">
      <a href="/what-we-think/?auth=<?php echo $team_member_id; ?>" class="button-container flex-1-3 flex-col">See All</a>
    </div>
    <?php  } ?>
  </section>
  <?php endif; ?>


  <?php endwhile; endif; ?>
</main>
<?php get_footer(); ?>
