<section id="module-<?php echo $i; ?>" class="module grid-module-flex">
	<div class="container flex-padding clearfix">
		<h2 class="underlined"><?php echo get_sub_field('module_title');?></h2>
		<div class="icon-items max-width">
			<?php if( have_rows('grid_item') ):   ?>
				<?php while( have_rows('grid_item') ): the_row();?>
					<div class="flex-col flex-1-2 grid-item-flex">
						<h4><?php the_sub_field('item_title'); ?></h4>
						<div class="item-content"><?php the_sub_field('item_content');?></div>
					</div>

				<?php endwhile; ?>

			<?php endif; ?>

		</div>
	</div>
</section>
<?php wp_reset_query(); ?>
