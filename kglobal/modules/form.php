<?php
  $iterator = $iterator ? $iterator : 'form';
  $title = get_sub_field('module_title') ? get_sub_field('module_title') : '';
  $description = get_sub_field('description') ? get_sub_field('description') : 'Want the latest in public relations and public affairs right in your inbox?';
  $form_id = get_sub_field('form_id') ? get_sub_field('form_id') : '77';
  if(strlen($description) < 2) {
    $description = '';
  }
  ?>

<section id="module-<?php echo $iterator; ?>" class="flex-container form-module module-padding">
  <div>
    <?php if($title) { ?>
    <h2 ><?php echo $title; ?></h2>
    <?php } ?>
    <h3><?php echo $description; ?></h3>
    <?php
    $wpform = '[wpforms id="'.$form_id.'"]';
    echo do_shortcode($wpform); ?>
  </div>
</section>
