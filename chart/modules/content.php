<?php
	$module_title = get_the_title();
	$module_content = "";

	$module_title = get_sub_field('module_title');
	$sub_content = get_sub_field('sub_content');
  $module_content = get_sub_field('wysiwyg_content');
  $pattern = get_sub_field("patterned");

?>

<section id="module-<?php echo $i; ?>" class="module content-module gray-bg <?php echo $pattern; ?>">
		<div class="flex-container center-aligned container">
			<div class="flex-col padding-5-0 full-width">
        <div class="max-width">
          <h2 class="underlined"><?php echo get_sub_field('module_title');?></h2>
  				<?php if ($sub_content) { ?>
  					<h5 class="module-summary"><?php echo $sub_content; ?></h5>
  				<?php } ?>
          <?php if ($module_content) { ?>
  					<?php echo $module_content; ?>
  				<?php } ?>
        </div>
        <?php if( have_rows('images') ):   ?>
          <div class="flex-container images-container">
    				<?php $count=0; while( have_rows('images') ): the_row(); $count++; endwhile;?>
            <?php while( have_rows('images') ): the_row(); ?>
              <div class="flex-col flex-1-<?php echo $count; ?>" style="background:url('<?php the_sub_field("image") ?>');background-size: cover; background-position: center center;">
              </div>
            <?php endwhile; ?>
          </div>
        <?php endif; ?>
        <?php if (get_sub_field("caption")) {?><div class="images-caption max-width"><?php the_sub_field("caption"); ?></div><?php } ?>
			</div>


		</div>


</section>
