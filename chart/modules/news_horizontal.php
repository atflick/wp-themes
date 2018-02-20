<?php

$user_hospitals = get_field('hospital', 'user_' . $current_user->ID);
$multiple_hospitals = count($user_hospitals) > 1;
$hos_slug = ($multiple_hospitals) ? "?i=".$hos_index : "";
?>

<section id="module-<?php echo $i; ?>" class="module news-teaser <?php echo $arrow; echo $post->post_type.'-item';?>">
	<?php if (has_post_thumbnail($post->ID)) : ?>
		<div class="news-teaser-image" style="background: url('<?php echo get_the_post_thumbnail_url($post->ID, 'medium');?>') center no-repeat; background-size: cover;">
			<div></div>
		</div>
	<?php endif ?>

		<?php $type = get_post_type_object( $post->post_type ); ?>

		<div class="news-meta">

			<?php if ($post->post_type != "event"){ ?>
				<span class="news-date"><?php the_author(); ?> | <?php the_time('F d, Y'); ?></span>
			<?php } else { ?>
				<span class="news-date"><?php the_field('start_date'); ?> <?php if(get_field('end_date')) : ?>
					- <?php the_field('end_date');
				endif; ?></span>
			<?php } ?>
		</div>
		<?php $link = get_permalink(); $target="";
		if ($post->post_type == "awards" || $post->post_type == "in_the_news"){
			$link = get_field("link");
			$target="_blank";
			} ?>
		<?php the_title( '<h3 class="entry-title"><a target="'.$target.'" href="' . $link . $hos_slug. '" title="' . the_title_attribute( 'echo=0' ) . '">', '</a></h3>' ); ?>

		<div class="entry-content">
			<?php if ($i==1) echo wp_trim_words(get_the_excerpt(), 50); else echo wp_trim_words(get_the_excerpt(), 20); ?>
		</div>
</section>

<a target="<?php echo $target; ?>" class="learn-more with-arrow" href="<?php print $link. $hos_slug; ?>">Read More</a>
<?php wp_reset_query(); ?>
