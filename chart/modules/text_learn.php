<?php 
	$module_image = "";
	$module_title = get_the_title();
	$module_content = "";
	$learn_more_text = "";
	$learn_more_link = "";

	if (null !== get_sub_field('module_image'))
		$module_image = get_sub_field('module_image');

	$module_title = get_sub_field('module_title');
	$module_content = get_sub_field('module_content');
	$learn_more_text = get_sub_field('learn_more_text');
	$learn_more_link = get_sub_field('learn_more_link');

?>

<section id="module-<?php echo $i; ?>" class="module text-learn">
		<div class="flex-container center-aligned container">
			<div class="flex-col flex-2-3 padding-3-0 right-3">
				<?php if ($module_content) { ?>
					<h4 class="module-content"><?php echo $module_content; ?></h4>
				<?php } ?>
			</div>

			
			<div class="flex-col flex-1-3 padding-3-0 align-center">
				<?php if ($learn_more_text) { ?>
					<?php echo '<a class="learn-more with-arrow" href="'.$learn_more_link.'">'.$learn_more_text.'</a>'; ?>
				<?php } ?>
			</div>

		</div>

	</div>
		
</section>