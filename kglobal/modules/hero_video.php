<?php
	$hero_image = get_sub_field('image');
	$hero_text = get_sub_field('module_title');
	$hero_content = get_sub_field('module_content', false, false);
	$video = get_sub_field('video');
	$cta_text = get_sub_field('button_text');
	$cta_link = get_sub_field('button_link');
?>

<section class="flex-container column justify-center hero-video">
	<div class="inner-hero flex-100 flex-container justify-center align-vert-center column" style="background:url('<?php echo $hero_image; ?>') no-repeat center center; background-size:cover;">
		<h2 class="text-shadow"><?php echo $hero_text; ?></h2>
		<div class="play_button"></div>
	</div>

	<div class="video-container hide"><?php echo $video; ?></div>
	<div class="">
		<p class=""><?php echo $hero_content; ?></p>
	</div>
	<div class="cta-link">
		<a href="<?php echo $cta_link; ?>"><h4><?php echo $cta_text; ?></h4></a>
	</div>
</section>
