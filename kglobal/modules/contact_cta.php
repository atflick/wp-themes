<?php $top_slant = get_sub_field('top_slant'); ?>
<section id="module-<?php echo $iterator;?>" class="flex-container column contact_cta <?php echo ($top_slant) ? 'top-module-slant' : ''; ?> " style="background:url(<?php echo get_sub_field('image'); ?>) no-repeat center center; background-size: cover;">
  <div class="orangeline">
    <h2 class="text-shadow"> <?php the_sub_field('module_title'); ?> </h2>
  </div>
  <a class="button-container flex-1-3 flex-col" href="<?php the_sub_field('button_link');?>"> <?php the_sub_field('button_text'); ?> </a>
</section>
