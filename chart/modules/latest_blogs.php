<?php
$blogArgs = array(
  'post_type'           => 'post',
  'posts_per_page'      => 3,
  'post__not_in' => array( $post->ID )
);
$blogs = get_posts($blogArgs);
?>
<?php if(!isset($i)){
  $i = 1;
} ?>
<section id="module-<?php echo $i; ?>" class="module news-module">
	<div class="max-width flex-padding">

    <div class="news-module-header">
      <h2 class="underlined">CHART News</h2>
    </div>


		<div class="flex-container news-posts">
			<?php if( $blogs ): ?>
				<?php foreach( $blogs as $post): $arrow=""; // variable must be called $post (IMPORTANT) ?>
				    <div class="flex-col flex-1-3 news-item">
					    <?php setup_postdata($post); ?>
					    <?php include ('news_item.php'); ?>
				    </div>
				<?php endforeach; ?>
			<?php endif; ?>

		</div>

    <div class="flex-container column news-module-header">
      <a class="learn-more news-learn-more with-arrow" href="/blog/">View All</a>
    </div>
	</div>
</section>
<?php wp_reset_postdata(); ?>
