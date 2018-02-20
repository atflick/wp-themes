<section id="module-<?php echo $iterator; ?>" class="flex-container work_sectors module-padding side-padding column align-vert-center justify-center">
  <h2> <?php the_sub_field('module_title'); ?></h2>
  <?php the_sub_field('module_content'); ?>
  <div class="work_sectors_icons flex-container flex-70 flex-col">
    <?php if(have_rows('work_icons') ) : ?>
      <?php while(have_rows('work_icons') ) : the_row(); ?>
        <div class="work-link flex-container column justify-center">
          <a href="<?php the_sub_field('link'); ?>" class="flex-100 flex-container column align-vert-center">
            <div class="icon">
              <div class="" style="background:url(<?php echo get_sub_field('image'); ?>) no-repeat center center; background-size: 85%;">
              </div>
            </div>
            <p> <?php the_sub_field('text'); ?> </p>
          </a>
        </div>
      <?php endwhile; ?>
    <?php endif; ?>
  </div>
</section>
