<section id="module-<?php echo $iterator; ?>" class="flex-container alternate-hero" style="background:url(<?php echo get_sub_field('image');?>) no-repeat center center; background-size:cover;">
  <div class="flex-container flex-60 flex-col highlight-container column">
    <div class="inner">
      <h1><?php the_sub_field('module_title'); ?></h1>
      <p><?php the_sub_field('module_content'); ?></p>
    </div>
  </div>
</section>
