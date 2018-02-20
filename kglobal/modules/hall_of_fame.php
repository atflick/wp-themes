<section id="module-<?php echo $iterator;?>" class="flex-container column align-vert-center justify-center module-padding side-padding hall-of-fame">
  <h2> <?php echo get_sub_field('module_title'); ?> </h2>
  <?php if( have_rows('image_repeater') ) : ?>
    <div class="photos flex-container justify-center">
  <?php while( have_rows('image_repeater') ): the_row(); ?>

        <div class="photo" style="background:url(<?php echo get_sub_field('image'); ?>) no-repeat center center; background-size: cover;">
          <div class="inner">

          </div>
        </div>

  <?php endwhile; ?>
  </div>
<?php endif; ?>
</section>
