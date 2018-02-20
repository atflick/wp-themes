<section id="module-<?php echo $iterator; ?>" class="flex-container module-padding center-center column partner-list">
  <?php if(get_sub_field('image') ) : ?>
    <img class="icon" src="<?php the_sub_field('image'); ?>"/>
  <?php endif; ?>
  <h2> <?php the_sub_field('module_title'); ?> </h2>
  <div class="partner-content">
    <?php the_sub_field('module_content'); ?>
  </div>

  <div class="flex-container partner-container">
    <?php if(have_rows('partners') ) : ?>
      <?php while( have_rows('partners') ) : the_row(); ?>
        <?php $post = get_sub_field('partner');
        setup_postdata($post);
        include('components/cards/partner_card.php');
        wp_reset_postdata();
        ?>
      <?php endwhile; ?>
    <?php endif; ?>
  </div>
</section>
