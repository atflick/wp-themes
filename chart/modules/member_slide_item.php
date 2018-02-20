	<?php
		$post_type = 'hospital';
		$taxonomy = 'state';
		$member_states = get_terms($taxonomy, array('post_type' => $post_type));
		foreach ($member_states as $state) {
		  $args = array(
		    'post_type' => $post_type,
		    $taxonomy => $state->slug,
				'orderby'=> 'title',
				'posts_per_page' => -1,
				'order' => 'ASC'
		  );
		  $query = new WP_Query($args);
		?>
<section id="slide" class="slide-item">
	<div class="state-bg <?php echo $state->slug; ?>">

	</div>
	<h5><?php echo $state->name; ?></h5>
	<div>
		<div>
			<ul class="member-list-slider">

			<?php
			if($query->post_count < 10) :
				if( $query->have_posts() ) : while( $query -> have_posts() ) : $query->the_post();?>

						<?php if(!get_field('parent_hospital')) { ?>
						<li class="single-col"><?php echo the_title();?></li>
						<?php } ?>

				<?php
					endwhile;
				endif;
				wp_reset_postdata();
			else :
				if( $query->have_posts() ) : while( $query -> have_posts() ) : $query->the_post();?>

						<?php if(!get_field('parent_hospital')) { ?>
						<li class="two-col"><?php echo the_title();?></li>
						<?php } ?>

				<?php
					endwhile;
				endif;
				wp_reset_postdata();
			endif;
				?>
			</ul>
		</div>
	</div>
</section>
<?php }	?>
