<section id="module-<?php echo $i; ?>" class="module checklist-module gray-bg pattern">
	<div class="container flex-padding clearfix">
		<h2 class="underlined"><?php echo get_sub_field('module_title');?></h2>
		<h5 class="module-summary"><?php the_sub_field("module_content") ?></h5>
		<?php $columns = get_sub_field("checklist_columns"); ?>
		<div id="column-container" class="column-container icon-items <?php echo $columns; ?>">
			<?php if( have_rows('grid_item') ):   ?>
				<?php while( have_rows('grid_item') ): the_row();?>
					<div class="flex-col flex-1-2 grid-item-flex">
						<h4 class="check-mark"><?php the_sub_field('item_title'); ?></h4>

						<div class="item-content"><?php the_sub_field('item_content');?></div>
					</div>

				<?php endwhile; ?>

			<?php endif; ?>

		</div>
		<div class="sponsor padding-0-3">
			<?php if( have_rows('images') ):   ?>
				<div class="sponsor-logo">
				<?php while( have_rows('images') ): the_row();?>
					<img src="<?php the_sub_field('image'); ?>"/>
				<?php endwhile; ?>
				</div>
			<?php endif; ?>
			<div class="sponsor-caption"><?php the_sub_field("caption"); ?></div>
		</div>
		<?php if (get_sub_field('learn_more_text')){?>
			<div class="flex-col padding-3-0 align-center">
				<?php if (get_sub_field('learn_more_text')) { ?>
					<?php echo '<a class="learn-more with-arrow" href="'.get_sub_field('learn_more_link').'">'.get_sub_field('learn_more_text').'</a>'; ?>
				<?php } ?>
			</div>
		<?php } ?>
	</div>
</section>
<?php wp_reset_query(); ?>
