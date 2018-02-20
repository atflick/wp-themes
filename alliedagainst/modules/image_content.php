<?php
  $title = get_sub_field('module_title');
  $content = get_sub_field('module_content');
  $position = get_sub_field('position');
  $image = get_sub_field('image');
  $image_type = get_sub_field('image_type');
  $background = get_sub_field('background_color');
  $button_text = get_sub_field('button_text');
  $button_link = get_sub_field('button_link');
 ?>


<section id="module-<?php echo $iterator; ?>" class="flex-container module-padding image-content <?php echo $background; ?>">
  <div class="content <?php echo $position; ?> <?php echo $image_type; ?>">
    <div class="inner">
      <h2><?php echo $title; ?></h2>
      <div class="">
        <?php echo $content; ?>
      </div>
    </div>

    <?php if($button_text) { ?>
    <div class="button-container">
      <a href="<?php echo $button_link; ?>" class="orange-button"><?php echo $button_text; ?></a>
    </div>
    <?php } ?>
  </div>

  <div class="image <?php echo $position; ?> <?php echo $image_type; ?>">
    <?php if($image_type === 'photo') { ?>


    <div class="<?php echo get_sub_field('blue_filter') ? 'bg-filter' : 'no-filter'; ?>" style="background-image:url(<?php echo $image; ?>);">
    </div>
    <?php } else { ?>
    <div class="">
      <img src="<?php echo $image; ?>" alt="">
    </div>
    <?php } ?>
  </div>

</section>
