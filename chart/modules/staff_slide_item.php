<?php
	$post_type = 'member';
	$args = array(
		'post_type' => $post_type,
		'orderby'=> 'title',
		'posts_per_page' => -1,
		'order' => 'ASC'
	);
	$query = new WP_Query($args);
?>

	<?php if( $query->have_posts() ) : while( $query -> have_posts() ) : $query->the_post();?>


<section id="slide" class="slide-item">
	<!-- <a href="<?php the_permalink(); ?>"> -->
		<div class="slide-headshot" style="background:url('<?php echo the_post_thumbnail_url( 'large' ); ?>') no-repeat center center;background-size:cover;">
			<!-- do not remove empty div -->
			<div></div>
		</div>

		<div class="center">
			<h5 class=""><?php echo the_field("first_name"); ?> <?php echo the_field("last_name"); ?></h5>
			<h6><?php echo the_field("title"); ?></h6>
		</div>
	<!-- </a> -->
</section>

<?php
endwhile;
endif;
wp_reset_postdata(); ?>
