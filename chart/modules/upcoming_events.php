<?php

$event_args = array(
  'post_type' => 'event',
  'posts_per_page' => 3,
  'meta_key' => 'start_date',
  'orderby' => 'meta_value',
  'order' => 'DESC'
);
$events = get_posts($event_args);
// $events = get_sub_field('featured_events');
?>

<section id="module" class="module news-module">
	<div class="container flex-padding">

		<div class="news-module-header">

			<h2 class="underlined">CHART Events</h2>
			<!-- <a class="view-all with-arrow" href="/newsroom/events/">View All</a> -->

		</div>

		<div class="flex-container news-posts">

			<?php if( $events ): ?>
				<?php foreach( $events as $post): $arrow=""; // variable must be called $post (IMPORTANT) ?>
				    <div class="flex-col flex-1-3 news-item">
					    <?php setup_postdata($post); ?>
					    <?php include ('news_item.php'); ?>
				    </div>
				<?php endforeach; ?>
			<?php endif; ?>


		</div>

    <div class="flex-container column news-module-header">
      <a class="learn-more news-learn-more with-arrow" href="/member_page/events">View All</a>
    </div>
	</div>
</section>
<?php wp_reset_query(); ?>
