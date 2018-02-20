<section id="module-<?php echo $iterator; ?>" class="flex-container module-padding <?php echo get_sub_field('steps_options') == 'cream' ? "" : "column center-center"; ?> steps <?php echo get_sub_field('steps_options'); ?>">
  <?php if( get_sub_field('steps_options') === 'green' ) { ?>
  <div class="flex-container column steps-container">
  <h2> <?php echo get_sub_field('module_title'); ?> </h2>
  <p class="subtitle"> <?php the_sub_field('module_subtitle', false, false); ?></p>
  <?php if(have_rows('steps') ) : $i = 1;?>
    <div class="flex-container steps-row">
    <?php while(have_rows('steps') ) : the_row(); ?>
      <div class="flex-container flex-30 step-container">
          <p class="step-title"> <?php echo get_sub_field('title'); ?> </p>
          <p><?php echo get_sub_field('step'); ?></p>
      </div>
    <?php $i++; endwhile; ?>
  </div>
  <?php endif; ?>
  </div>
 
 
  <?php } elseif( get_sub_field('steps_options') === 'cream' ) { ?>
    <div class="flex-container column steps-header"> 
      <h2> <?php the_sub_field('module_title'); ?></h2> 
      <p> <?php the_sub_field('module_subtitle'); ?> </p>
  </div>
  <div class="flex-container column steps-container">
     <?php if(have_rows('steps') ) : $i = 1;?>
    <?php while(have_rows('steps') ) : the_row(); ?>
      <div class="flex-container flex-100 step-container">
        <div class="flex-container">
          <p class="subtitle"> <?php echo get_sub_field('title'); ?> </p>
          <p><?php echo get_sub_field('step'); ?></p>
        </div>
      </div>
    <?php $i++; endwhile; ?>
  <?php endif; ?>
  </div>
  <?php } ?>
</section>
