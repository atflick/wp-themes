<section id="module-<?php echo $iterator; ?>" class="flex-container justify-center align-vert-center module-padding side-padding image-slider">
  <div class="flex-40 flex-col flex-container column justify-center blurb-content align-vert-center">
    <p> <?php echo get_sub_field('module_content'); ?>
    <a class="button-container flex-100" href="<?php the_sub_field('button_link');?>"> <?php the_sub_field('button_text'); ?> </a>
  </div>
  <?php if( have_rows('image_repeater') ) : ?>
    <div class="image-slider-container flex-60 flex-col flex-container column justify-center align-vert-center">
    <?php while( have_rows('image_repeater') ) : the_row(); ?>
      <div class="flex-container image justify-center column align-vert-center" style="background: url(<?php echo get_sub_field('image'); ?>) no-repeat center center; background-size: cover;">
        <div class="">
        </div>
      </div>
    <?php endwhile; ?>
  </div>
<?php endif; ?>
</section>
