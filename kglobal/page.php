<?php get_header(); ?>

<main id="main-section" class="main-section">
	<!-- Page Content Area -->
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>

		<?php endwhile; ?>
	<?php endif;  ?>
	<!-- Page Modules -->
	<?php include ("modules/modules.php"); ?>
</main>

<?php get_footer(); ?>
