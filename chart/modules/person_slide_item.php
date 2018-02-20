<section id="slide" class="slide-item">
	<div class="slide-headshot" style="background:url('<?php echo get_sub_field("slide_image"); ?>') no-repeat center center;background-size:cover;">
		<!-- do not remove empty div -->
		<div></div>
	</div>

	<div class="center">
		<h5 class=""><?php echo get_sub_field("slide_title"); ?></h5>
		<h6><?php echo get_sub_field("slide_tag"); ?></h6>
		<?php if (get_sub_field("link_url")) { ?>
		<a class="learn-more with-arrow" href="<?php echo get_sub_field("link_url") ?>"><?php echo get_sub_field("link_name"); ?></a>
		<?php } ?>
	</div>

</section>
<?php wp_reset_postdata(); ?>
