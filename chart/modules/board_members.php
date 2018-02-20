<section id="module-<?php echo $i; ?>" class="module board-member-module">
	<div class="center-aligned slider-container">
		<h2 class=""><?php echo get_sub_field('module_title');?></h2>
		<h5><?php echo get_sub_field('module_title_2');?></h5>
		<div class="flex-container">
			<?php if( have_rows('board_member_items') ):   ?>
				<?php while( have_rows('board_member_items') ): the_row();?>

					<div class="board-member-item">
						<h4><?php the_sub_field('name'); ?></h4>
						<h6><?php the_sub_field('affiliation');?></h6>
					</div>

				<?php endwhile; ?>
			<?php endif; ?>

		</div>
	</div>
</section>
<?php wp_reset_query(); ?>
