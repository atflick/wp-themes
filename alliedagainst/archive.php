<?php get_header(); ?>
<?php $post_type = get_post_type(); ?>
<?php $data = array(
  'post_term' => get_queried_object()->taxonomy,
); ?>
<section id="main-section" class="main-section">
  <?php if(have_posts() ) : ?>
    <?php while(have_posts() ) : the_post(); ?>
      <?php include('modules/components/cards/'.$post_type.'_card.php'); ?>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
  <?php endif; ?>
</section>

<?php get_footer(); ?>
