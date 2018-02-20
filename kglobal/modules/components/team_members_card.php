<div class="staff-card flex-container <?php echo $logo_bg_class; ?>">

  <?php if (get_field('no_single_page_link')): ?>
  <div class="staff-inner flex-100 flex-container">
  <?php else : ?>
  <a href="<?php the_permalink(); ?>" class="staff-inner flex-100 flex-container">
  <?php endif; ?>

    <div class="headshot flex-1-3" style="background: url(<?php echo get_the_post_thumbnail_url(); ?>) center no-repeat; background-size: cover;">
      <div class="headshot-inner">
      </div>
    </div>

    <div class="staff-info flex-2-3">
      <h3 class=""><?php the_field('first_name'); ?> <?php the_field('last_name'); ?></h3>
      <h4><?php the_field('title'); ?></h4>
      <h4 class="email"><?php the_field('email'); ?></h4>
      <h4 class="phone"><?php the_field('phone'); ?></h4>
    </div>

  <?php if (get_field('no_single_page_link')): ?>
  </div>
  <?php else : ?>
  </a>
  <?php endif; ?>

</div>
