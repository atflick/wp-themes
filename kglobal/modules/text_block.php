<?php
$text_content = get_sub_field('module_content', false, false);
$top_slant = get_sub_field('top_slant');
$bottom_slant = get_sub_field('bottom_slant');
$line_style = get_sub_field('line_style');
$image = get_sub_field('image');
 ?>

<section id="module-<?php echo $iterator; ?>" class="flex-container text-block <?php //echo ($top_slant) ? 'top-slant' : ''; ?> <?php echo ($bottom_slant) ? 'bottom-slant white' : ''; ?>">
  <?php if($top_slant) { ?>
  <div class="slant-bg mobile">
  </div>
  <div class="slant-bg dimmer" style="<?php echo ($image) ? 'background: url('.$image.') no-repeat left center, #fff; background-size: contain;' : ''; ?>">
  </div>
  <?php } ?>

  <div class="inner <?php echo ($line_style === 'blueline') ? 'blueline' : 'under-orangeline'; ?> flex-100">
    <h3><?php echo $text_content ?></h3>
  </div>

</section>
