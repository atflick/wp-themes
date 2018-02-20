<section id="module-<?php echo $i; ?>" class="module icons-module container padding-3-0">
	<h2 class="underlined"><?php echo get_sub_field('module_title');?></h2>
	<div class="flex-container icon-items max-width">
		<?php $count=0; if( have_rows('icons') ):
		 	 		while( have_rows('icons') ): the_row();
			 			$count++;
		 			endwhile; ?>
			<?php while( have_rows('icons') ): the_row(); ?>

				<div class="flex-col flex-1-<?php echo $count; ?> icon-item">
					<a href="<?php the_sub_field("icon_link") ?>">
						<div class="icon-image"><img class="icon-inside" data-hover='<?php echo get_template_directory_uri(); ?>/dist/images/icons/icon-hover.png' data-icon='<?php echo get_sub_field('icon_image'); ?>' src="<?php echo get_sub_field('icon_image'); ?>" alt="<?php echo get_sub_field('icon_name');?>" /></div>
						<h6 class="icon-name"><?php echo get_sub_field('icon_name');?></h6>
					</a>
				</div>

			<?php endwhile; ?>

		<?php endif; ?>

	</div>
</section>
<?php wp_reset_query(); ?>
