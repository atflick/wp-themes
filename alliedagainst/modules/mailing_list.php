<section id="module-<?php echo $iterator; ?>" class="flex-container form-module module-padding" style="background: url(<?php the_sub_field('image'); ?>) no-repeat center center; background-size:cover;">
<div id="mailing-list" class="flex-container form-container column flex-40 flex-col">
  <h2><?php echo get_sub_field('module_title'); ?> </h2>
  <p> <?php echo get_sub_field('module_content', false, false); ?> </p>
  <?php echo do_shortcode('[wpforms id="227"]'); ?>
</div>
</section>
