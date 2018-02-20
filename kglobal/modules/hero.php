<?php
	$hero_image = get_sub_field('image');
	$hero_text = get_sub_field('module_title');
	$hero_content = get_sub_field('module_content', false, false);
?>

<section id="hero" class="flex-container column justify-center hero <?php echo get_sub_field('bottom_slant') ? "hero-bottom-slant" : ""; ?>" style="background:url('<?php echo $hero_image; ?>') no-repeat center center; background-size:cover; background-attachment: fixed;">
	<div class="inner-hero">
		<h1 class="text-shadow"><?php echo $hero_text; ?></h1>
		<h2><?php echo $hero_content; ?></h2>
	</div>
</section>
