<section id="module-<?php echo $iterator;?>" class="flex-container big_image_text_left module-padding column" style="background: url(<?php echo get_sub_field('image'); ?>) no-repeat center center; background-size: cover;">
<!--  image left section -->
  <div class="module-title flex-container flex-100 flex-col orangeline">
    <h2 class="text-shadow"> <?php echo get_sub_field('module_title'); ?></h2>
  </div>
<!--  text right section -->
  <div class="flex-40 flex-col flex-container column">
    <h5> <?php echo get_sub_field('module_content', false, false); ?></h5>
    <p> <?php echo get_sub_field('module_sub_content', false, false); ?></p>
    <a class="button-container" href="<?php the_sub_field('button_link');?>"> <?php the_sub_field('button_text'); ?> </a>
  </div>
</section>
