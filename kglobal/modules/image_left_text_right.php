<section id="module-<?php echo $iterator;?>" class="flex-container image_left_text_right module-padding side-padding">
<!--  image left section -->
  <div class="module-title flex-container flex-100 flex-col">
    <h2 class=""> <?php echo get_sub_field('module_title'); ?></h2>
  </div>
<!--  text right section -->
  <div class="flex-60 image" style="background: url(<?php echo get_sub_field('image'); ?>) no-repeat center center; background-size: contain;">
    <div class="inner">
    </div>
  </div>

  <div class="flex-40 flex-col flex-container column content-area">
    <h5> <?php echo get_sub_field('module_content', false, false); ?></h5>
    <p> <?php echo get_sub_field('wysiwyg'); ?></p>
    <?php if(get_sub_field('button_text')) { ?>
      <a class="button-container" href="<?php the_sub_field('button_link');?>"> <?php the_sub_field('button_text'); ?> </a>
    <?php } ?>
  </div>
</section>
