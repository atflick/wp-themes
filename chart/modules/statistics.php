<section id="module-<?php echo $i; ?>" class="module statistics-module gray-bg">
	<div class="container">
		<div class="statistics-number <?php if (get_sub_field('stats_modifier')) { print 'long-text'; } ?>" data-stop="<?php the_sub_field("disable_statistic_counter"); ?>"><?php the_sub_field("statistics_number"); ?></div>
		<h2 class="two-thirds"><?php the_sub_field("statistics_content"); ?></h2>
	</div>
</section>
