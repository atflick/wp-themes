<div class="checklist-module">

				<h5 class="module-summary"><?php echo get_sub_field("tab_title"); ?></h5>
            <div class="column-container icon-items max-width">
              <?php if( have_rows('tab_checklist_items') ): ?>
                <?php while ( have_rows('tab_checklist_items') ) : the_row(); ?>
        					<div class="flex-col flex-1-2">
        						<h4 class="check-mark"><?php the_sub_field('checklist_title'); ?></h4>

        						<div class="item-content"><?php the_sub_field('checklist_content');?></div>
        					</div>

        				<?php endwhile; ?>

        			<?php endif; ?>

        		</div>


</div>

<?php wp_reset_postdata(); ?>
