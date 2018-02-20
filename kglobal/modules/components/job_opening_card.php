<a href="<?php the_permalink(); ?>" class="job-card flex-100">
  <div class="flex-container inner-card">
    <?php if(get_the_post_thumbnail_url()) { ?>
    <div class="headshot" style="background: url(<?php echo get_the_post_thumbnail_url(); ?>) center no-repeat; background-size: cover;">
      <div class="headshot-inner">
      </div>
    </div>
    <?php } ?>

    <div class="job-info <?php echo (get_the_post_thumbnail_url()) ? 'flex-50' : 'flex-100'; ?>">
      <h3 class="line-after short"><?php the_title(); ?></h3>

      <p><?php (get_field('preview_text')) ? the_field('preview_text') : the_excerpt(); ?></p>
    </div>
  </div>
</a>
