<?php
	$module_image = "";
	$module_title = "";
	$module_content = "";

	if (null !== get_sub_field('module_image'))
		$module_image = get_sub_field('module_image');

	$module_title = get_sub_field('sub_content');
	$module_content = get_sub_field('module_content');

?>

<section id="module-<?php echo $i; ?>" class="module testimonial gray-bg">
		<div class="flex-container center-aligned container flex-padding">
			<div class="flex-col padding-4">

				<?php if ($module_content) { ?>
					<h2><?php echo $module_content; ?></h2>
          <h4><?php echo get_sub_field('sub_content');?></h4>
				<?php } ?>
			</div>


		</div>

	</div>

</section>
