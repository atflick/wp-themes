<section id="module-<?php echo $iterator; ?>" class="flex-container highlight-block module-padding">
   <div class="flex-container flex-60 flex-col highlight-container column">
    <h1> <?php the_sub_field('module_title'); ?> </h1>
    <p> <?php the_sub_field('module_content', false, false); ?> </p>
  </div>
    <div class="flex-40 flex-col button-container">
      <div class="button-container">
        <a href="<?php echo get_sub_field('button_link'); ?>" class="orange-button"><?php echo get_sub_field('button_text'); ?></a>
      </div>
    </div>
</section>
